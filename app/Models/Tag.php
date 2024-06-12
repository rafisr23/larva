<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    // public function blogs()
    // {
    //     return $this->belongsToMany(Blog::class);
    // }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tag');
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
}