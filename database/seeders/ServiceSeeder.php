<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'service_name' => 'Mechandise & Gift',
            'slug' => 'merchandise-gift',
            'tagline' => 'Mechandise dan Hadiah Kustom',
            'description' => 'Kami menyediakan mechandise dan hadiah yang dapat disesuaikan dengan kebutuhan Anda.',
            'min_price' => 50000,
            'max_price' => 1000000,
            'notes' => 'Harga dapat bervariasi berdasarkan tingkat kustomisasi dan kuantitas.',
            'is_active' => 1
        ]);

        Service::create([
            'service_name' => 'Konveksi Sablon',
            'slug' => 'konveksi-sablon',
            'tagline' => 'Layanan Sablon Kustom',
            'description' => 'Spesialis dalam sablon kustom untuk berbagai jenis pakaian dan kain.',
            'min_price' => 50000,
            'max_price' => 1000000,
            'notes' => 'Diskon besar tersedia untuk pesanan dalam jumlah besar.',
            'is_active' => 1
        ]);
        
        Service::create([
            'service_name' => 'Design Studio',
            'slug' => 'design-studio',
            'tagline' => 'Solusi Desain Kreatif',
            'description' => 'Menyediakan solusi desain inovatif dan unik untuk proyek-proyek Anda.',
            'min_price' => 50000,
            'max_price' => 100000,
            'notes' => 'Desain disesuaikan dengan merek Anda.',
            'is_active' => 1
        ]);

        Service::create([
            'service_name' => 'Screen Printing',
            'slug' => 'screen-printing',
            'tagline' => 'Layanan Sablon Profesional',
            'description' => 'Sablon berkualitas tinggi untuk pakaian dan barang promosi.',
            'min_price' => 50000,
            'max_price' => 100000,
            'notes' => 'Waktu pengerjaan cepat dan harga khusus untuk pesanan besar.',
            'is_active' => 1
        ]);

        Service::create([
            'service_name' => 'Clothing Supplier',
            'slug' => 'clothing-supplier',
            'tagline' => 'Pemasok Pakaian Grosir',
            'description' => 'Sumber pakaian grosir dengan berbagai opsi.',
            'min_price' => 50000,
            'max_price' => 100000,
            'notes' => 'Diskon besar dan opsi kustomisasi tersedia.',
            'is_active' => 1
        ]);

        Service::create([
            'service_name' => 'Web Development',
            'slug' => 'web-development',
            'tagline' => 'Layanan Pengembangan Situs Web',
            'description' => 'Layanan pengembangan ahli untuk proyek situs web dan perangkat lunak.',
            'min_price' => 50000,
            'max_price' => 100000,
            'notes' => 'Solusi yang disesuaikan untuk memenuhi kebutuhan spesifik Anda.',
            'is_active' => 1
        ]);
    }
}