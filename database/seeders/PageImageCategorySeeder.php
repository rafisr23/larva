<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageImageCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageImageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PageImageCategory::create([
            'category_name' => 'home-middle',
            'slug' => 'home-middle',
            'is_active' => 1,
        ]);
        PageImageCategory::create([
            'category_name' => 'about-header',
            'slug' => 'about-header',
            'is_active' => 1,
        ]);
        PageImageCategory::create([
            'category_name' => 'service-header',
            'slug' => 'service-header',
            'is_active' => 1,
        ]);
        PageImageCategory::create([
            'category_name' => 'service-middle',
            'slug' => 'service-middle',
            'is_active' => 1,
        ]);
        PageImageCategory::create([
            'category_name' => 'project-header',
            'slug' => 'project-header',
            'is_active' => 1,
        ]);
        PageImageCategory::create([
            'category_name' => 'contact-header',
            'slug' => 'contact-header',
            'is_active' => 1,
        ]);
    }
}