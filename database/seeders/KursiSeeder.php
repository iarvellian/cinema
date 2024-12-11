<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KursiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = range('A', 'L');
        $seats = range(1, 20);

        $data = [];
        foreach ($rows as $row) {
            foreach ($seats as $seat) {
                $data[] = [
                    'baris' => $row,
                    'no_kursi' => $seat,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('kursis')->insert($data);
    }
}
