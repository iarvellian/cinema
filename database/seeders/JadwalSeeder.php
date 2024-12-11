<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwalData = [];
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addMonth();
        $filmIds = range(1, 20);
        $hargaOptions = [50000, 100000, 150000];

        foreach ($filmIds as $filmId) {
            for ($i = 0; $i < rand(3, 7); $i++) {
                $randomDate = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp));
                $jadwalData[] = [
                    'film_id' => $filmId,
                    'tgl_tayang' => $randomDate->toDateString(),
                    'jam_tayang' => $randomDate->format('H:i:s'),
                    'harga' => $hargaOptions[array_rand($hargaOptions)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('jadwals')->insert($jadwalData);
    }
}
