<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'company_name' => 'SMA XYZ',
            'slug' => 'sma-xyz',
            'description' => 'Berkolaborasi dengan SMA XYZ untuk menyediakan seragam sekolah berkualitas tinggi dengan desain yang modern.',
        ]);
        
        Partner::create([
            'company_name' => 'Rumah Sakit Sehat Sentosa',
            'slug' => 'rumah-sakit-sehat-sentosa',
            'description' => 'Mitralah dengan Rumah Sakit Sehat Sentosa untuk proyek kesehatan, penyediaan pakaian medis, dan solusi branding.',
        ]);
        
        Partner::create([
            'company_name' => 'Supermart Maju Jaya',
            'slug' => 'supermart-maju-jaya',
            'description' => 'Kolaborasi dengan Supermart Maju Jaya untuk menyediakan seragam karyawan dan merchandise promosi berkualitas tinggi.',
        ]);

        Partner::create([
            'company_name' => 'TechSolutions IT Consulting',
            'slug' => 'techsolutions-it-consulting',
            'description' => 'Berkolaborasi dengan TechSolutions IT Consulting untuk proyek pengembangan perangkat lunak dan solusi IT.',
        ]);
        
        Partner::create([
            'company_name' => 'Restoran Suka Rasa',
            'slug' => 'restoran-suka-rasa',
            'description' => 'Jalin kemitraan dengan Restoran Suka Rasa untuk menyediakan seragam karyawan dan merchandise promosi di restoran.',
        ]);
        
        Partner::create([
            'company_name' => 'Bengkel Motor Andalan',
            'slug' => 'bengkel-motor-andalan',
            'description' => 'Kolaborasi dengan Bengkel Motor Andalan untuk proyek penyediaan seragam teknisi dan merchandise bengkel.',
        ]);
        
        Partner::create([
            'company_name' => 'Studio Fotografi Kreatif',
            'slug' => 'studio-fotografi-kreatif',
            'description' => 'Jalin kemitraan dengan Studio Fotografi Kreatif untuk proyek penyediaan seragam staf dan merchandise promosi.',
        ]);
        
        Partner::create([
            'company_name' => 'Hotel Mewah Indah',
            'slug' => 'hotel-mewah-indah',
            'description' => 'Berkolaborasi dengan Hotel Mewah Indah untuk penyediaan seragam dan merchandise eksklusif di hotel.',
        ]);
        
        Partner::create([
            'company_name' => 'GymFit Health Club',
            'slug' => 'gymfit-health-club',
            'description' => 'Kolaborasi dengan GymFit Health Club untuk proyek penyediaan seragam anggota dan merchandise promosi di pusat kebugaran.',
        ]);        
        
    }
}