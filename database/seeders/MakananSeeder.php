<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makanans = [
            [
                'nama_makanan' => 'Nasi Goreng',
                'deskripsi' => 'Nasi yang digoreng dengan bumbu spesial dan tambahan telur.',
                'harga' => 20000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Mie Goreng',
                'deskripsi' => 'Mie goreng dengan bumbu khas dan tambahan sayuran segar.',
                'harga' => 15000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Sate Ayam',
                'deskripsi' => 'Sate ayam dengan bumbu kacang khas Indonesia.',
                'harga' => 25000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Bakso',
                'deskripsi' => 'Bakso sapi yang disajikan dengan kuah kaldu hangat.',
                'harga' => 20000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Ayam Goreng',
                'deskripsi' => 'Ayam goreng dengan bumbu tradisional dan sambal.',
                'harga' => 30000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Gado-Gado',
                'deskripsi' => 'Salad sayuran dengan saus kacang khas Indonesia.',
                'harga' => 18000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Rendang',
                'deskripsi' => 'Daging sapi yang dimasak dengan bumbu rendang tradisional.',
                'harga' => 40000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Soto Ayam',
                'deskripsi' => 'Soto ayam dengan kuah bening dan tambahan nasi.',
                'harga' => 20000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Pempek',
                'deskripsi' => 'Pempek Palembang dengan saus cuko yang khas.',
                'harga' => 25000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
            [
                'nama_makanan' => 'Nasi Uduk',
                'deskripsi' => 'Nasi yang dimasak dengan santan dan disajikan dengan lauk.',
                'harga' => 18000,
                'gambar_url' => 'https://via.placeholder.com/150',
            ],
        ];

        foreach ($makanans as $makanan) {
            DB::table('makanans')->insert([
                'nama_makanan' => $makanan['nama_makanan'],
                'deskripsi' => $makanan['deskripsi'],
                'harga' => $makanan['harga'],
                'gambar_url' => $makanan['gambar_url'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
