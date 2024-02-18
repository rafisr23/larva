<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageImageCategory extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function headerPageImages()
    {
        return $this->hasMany(HeaderPageImage::class, 'category_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'category_name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}