<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'address' => 'Perumahan Mustika Hegar Regency Ruko Timur, Kel. Margasari, Kec. Buahbatu',
            'city' => 'Bandung',
            'country' => 'Indonesia',
            'postal_code' => '40286',
            'phone' => '08123456789',
            'email' => 'larvacreativeindustry@gmail.com'
        ]);
    }
}