<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Petugas', 'email' => 'petugas@lele.id', 'password' => Hash::make('petugas123'), 'password_helper' => 'petugas123', 'level' => 'petugas'],
            ['name' => 'Admin', 'email' => 'admin@lele.id', 'password' => Hash::make('admin123'), 'password_helper' => 'admin123', 'level' => 'admin'],
            ['name' => 'Masyarakat', 'email' => 'masyarakat@lele.id', 'password' => Hash::make('masyarakat123'), 'password_helper' => 'masyarakat123', 'level' => 'masyarakat'],
        ];
        User::insert($data);
    }
}
