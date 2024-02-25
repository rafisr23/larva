<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimoni::create([
            'user_id' => 1,
            'service_id' => 1,
            'description' => 'Pelayanan yang sangat memuaskan, saya sangat senang dengan hasilnya. Terima kasih banyak.'
        ]);
        
        Testimoni::create([
            'user_id' => 1,
            'service_id' => 6,
            'description' => 'Web yang dibuat sangat bagus, saya sangat puas dengan hasilnya'
        ]);
        
        Testimoni::create([
            'user_id' => 1,
            'service_id' => 3,
            'description' => 'Hasil desain sangat sesuai permintaan ditambah lagi pelayanan yang ramah dan harga bersaing. Terima kasih banyak.'
        ]);

        // create more with varation descriptiion
        
    }
}