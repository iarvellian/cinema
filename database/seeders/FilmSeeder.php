<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['Now Playing', 'Coming Soon'];

        for ($i = 1; $i <= 20; $i++) {
            DB::table('films')->insert([
                'judul' => 'Film ' . Str::random(5),
                'deskripsi' => 'Deskripsi untuk Film ' . $i . '. ' . Str::random(50),
                'cuplikan_url' => rand(0, 1) ? 'https://www.youtube.com/watch?v=' . Str::random(10) : null,
                'tgl_tayang' => Carbon::today()->addDays(rand(-30, 30))->toDateString(),
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
