<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\BlogImage;
use App\Models\BlogCategories;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use RalphJSmit\Laravel\SEO\Schema\BreadcrumbListSchema;

class Blog extends Model
{
    use HasFactory, Sluggable, HasSEO;

    protected $guarded = ['id'];
    protected $with = ['category', 'tags', 'user', 'images'];

    public function category()
    {
        return $this->belongsTo(BlogCategories::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['user'] ?? false, function ($query, $user) {
            return $query->whereHas('user', function ($query) use ($user) {
                $query->where('username', $user);
            });
        });

        $query->when($filters['tag'] ?? false, function ($query, $tags) {
            if (!is_array($tags)) {
                $tags = [$tags];
            }
            return $query->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('slug', $tags);
            });
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getDynamicSEOData(): SEOData
    {
        // $pathToFeaturedImageRelativeToPublicPath = // ..;
        $tags = explode(', ', $this->meta_keyword);

        // Override only the properties you want:
        return new SEOData(
            title: $this->meta_title,
            description: $this->meta_description,
            author: $this->meta_author,
            tags: $tags,
            published_time: Carbon::parse($this->published_at),
            modified_time: Carbon::parse($this->modified_at),
            schema: SchemaCollection::initialize()
            ->addBreadcrumbs(function (BreadcrumbListSchema $breadcrumbs): BreadcrumbListSchema {
                return $breadcrumbs
                    ->prependBreadcrumbs([
                    'Homepage' => route('blog.index'),
                    'Category' => route('blog.index', ['category' => $this->category->slug]),
                    ])
                    ->appendBreadcrumbs([
                        'Subarticle' => route('blog.show', $this->slug),
                    ]);
            })
            ->addArticle()
        );
    }

}