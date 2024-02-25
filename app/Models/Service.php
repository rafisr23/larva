<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function serviceImage()
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function serviceTeam()
    {
        return $this->hasMany(ServiceTeam::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'service_name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class);
    }
}