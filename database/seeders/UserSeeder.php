<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@petrokimia.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'email' => 'karyawan1@petrokimia.com',
            'password' => bcrypt('password'),
            'name' => 'Karyawan 1',
            'nik' => '3511022501010004',
            'kompartemen' => 'Kompartemen 1',
            'departemen' => 'Departemen 1',
            'unit_kerja' => 'Unit Kerja 1',
            'alamat' => 'Alamat 1',
            'telepon' => '082330943811',
            'type' => 'Organik',
        ]);
        $user->assignRole('user');

        $user = User::create([
            'email' => 'karyawan2@petrokimia.com',
            'password' => bcrypt('password'),
            'name' => 'Karyawan 2',
            'nik' => '3511022403010004',
            'kompartemen' => 'Kompartemen 1',
            'departemen' => 'Departemen 2',
            'unit_kerja' => 'Unit Kerja 2',
            'alamat' => 'Alamat 2',
            'telepon' => '082120934121',
            'type' => 'Non Organik',
        ]);
        $user->assignRole('user');
    }
}