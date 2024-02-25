<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // call RoleSeeder
        // $this->call(RoleSeeder::class);

        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'larva@gmail.com',
        //     'username' => 'admin',
        //     'password' => bcrypt('password'),
        // ])->assignRole(['admin']);

        $this->call([
            // ServiceSeeder::class,
            // PartnerSeeder::class,
            // ProjectSeeder::class,
            TestimoniSeeder::class,
        ]);
    }
}