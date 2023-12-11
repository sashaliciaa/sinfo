<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();
        Jabatan::factory()->create(
            [
                'jabatan' => 'admin',
            ],
        );

        User::factory()->create([
            'email' => 'admin@admin.com',
            'username' => 'admin_username',
            'nama_awal' => 'Admin',
            'nama_akhir' => 'User',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'), // You may want to use Hash::make() instead of bcrypt() based on your Laravel version
            'alamat' => 'Admin Address',
            'telp' => '123456789',
            'jabatan_id' => '1',
            'tgl_mulai_jabat' => now(),
            'foto' => 'foto', // Adjust this based on your requirements
            'remember_token' => Str::random(10),
        ]);
    }
}
