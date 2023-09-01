<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userdata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'admin',
                'password' => 'admin',
                'nama' => 'Admin',
                'level' => 'admin'
            ],
            [
                'username' => 'tono',
                'password' => '1234',
                'nama' => 'Tono',
                'level' => 'siswa'
            ]
            ];
        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
