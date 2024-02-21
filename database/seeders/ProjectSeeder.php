<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'service_id' => 1,
            'project_name' => 'Proyek Merchandise Kustom',
            'slug' => 'proyek-merchandise-kustom',
            'company_name' => 'Perusahaan ABC',
            'description' => 'Proyek pengadaan merchandise kustom untuk kegiatan perusahaan.',
        ]);
        
        Project::create([
            'service_id' => 1,
            'project_name' => 'Proyek Hadiah Promosi',
            'slug' => 'proyek-hadiah-promosi',
            'company_name' => 'Perusahaan XYZ',
            'description' => 'Proyek pembuatan hadiah promosi unik untuk kampanye perusahaan.',
        ]);

        Project::create([
            'service_id' => 2,
            'project_name' => 'Proyek Sablon Pakaian',
            'slug' => 'proyek-sablon-pakaian',
            'company_name' => 'Fashion Co.',
            'description' => 'Proyek sablon untuk pakaian baru dalam koleksi perusahaan.',
        ]);
        
        Project::create([
            'service_id' => 2,
            'project_name' => 'Proyek Sablon Seragam',
            'slug' => 'proyek-sablon-seragam',
            'company_name' => 'Sekolah XYZ',
            'description' => 'Proyek sablon untuk seragam siswa sekolah.',
        ]);
        
        Project::create([
            'service_id' => 3,
            'project_name' => 'Proyek Desain Brosur',
            'slug' => 'proyek-desain-brosur',
            'company_name' => 'Perusahaan Brosur',
            'description' => 'Proyek desain brosur untuk promosi produk baru.',
        ]);
        
        Project::create([
            'service_id' => 3,
            'project_name' => 'Proyek Identitas Visual',
            'slug' => 'proyek-identitas-visual',
            'company_name' => 'Startup Tech',
            'description' => 'Proyek pengembangan identitas visual untuk startup teknologi.',
        ]);
        
        Project::create([
            'service_id' => 4,
            'project_name' => 'Proyek Sablon Merchandise',
            'slug' => 'proyek-sablon-merchandise',
            'company_name' => 'Event Organizer',
            'description' => 'Proyek sablon merchandise untuk acara besar.',
        ]);
        
        Project::create([
            'service_id' => 4,
            'project_name' => 'Proyek Sablon Kaos Komunitas',
            'slug' => 'proyek-sablon-kaos-komunitas',
            'company_name' => 'Komunitas Seni',
            'description' => 'Proyek sablon kaos untuk mendukung kegiatan komunitas seni.',
        ]);

        Project::create([
            'service_id' => 5,
            'project_name' => 'Proyek Pemasok Baju Sekolah',
            'slug' => 'proyek-pemasok-baju-sekolah',
            'company_name' => 'Sekolah ABC',
            'description' => 'Proyek pasokan baju sekolah untuk tahun ajaran baru.',
        ]);
        
        Project::create([
            'service_id' => 5,
            'project_name' => 'Proyek Pemasok Kaos Event',
            'slug' => 'proyek-pemasok-kaos-event',
            'company_name' => 'Event Organizer XYZ',
            'description' => 'Proyek pasokan kaos untuk acara spesifik.',
        ]);

        Project::create([
            'service_id' => 6,
            'project_name' => 'Proyek Pengembangan Situs Web Perusahaan',
            'slug' => 'proyek-pengembangan-situs-web',
            'company_name' => 'Perusahaan Teknologi',
            'description' => 'Proyek pengembangan situs web korporat untuk perusahaan teknologi.',
        ]);
        
        Project::create([
            'service_id' => 6,
            'project_name' => 'Proyek Toko Online',
            'slug' => 'proyek-toko-online',
            'company_name' => 'Toko ABC',
            'description' => 'Proyek pengembangan toko online untuk penjualan produk secara digital.',
        ]);
        
    }
}