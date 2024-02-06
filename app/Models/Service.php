<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

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
}