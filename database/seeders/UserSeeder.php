<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID role berdasarkan jenis_role
        $adminRoleId = DB::table('roles')->where('jenis_role', 'admin')->value('id');
        $userRoleId = DB::table('roles')->where('jenis_role', 'user')->value('id');

        // Insert data ke tabel users
        DB::table('users')->insert([
            [
                'nama' => 'admin',
                'email' => 'email@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('gwadmint'),
                'role_id' => $adminRoleId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'user',
                'email' => 'email2@gmail.com',
                'username' => 'userpw',
                'password' => Hash::make('userpw'),
                'role_id' => $userRoleId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
