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
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'email' => 'karyawan1@user.com',
            'password' => bcrypt('password'),
            'name' => 'Karyawan 1',
            'nik' => '3511022501010004',
            'kompartemen' => 'Kompartemen A',
            'departemen' => 'Departemen B',
            'unit_kerja' => 'Unit Kerja C',
            'alamat' => 'Jl. Mangga muda no.4 Malang',
            'telepon' => '082330943811',
            'type' => 'Organik',
        ]);
        $user->assignRole('user');

        $user = User::create([
            'email' => 'karyawan2@user.com',
            'password' => bcrypt('password'),
            'name' => 'Karyawan 2',
            'nik' => '3511022403010004',
            'kompartemen' => 'Kompartemen B',
            'departemen' => 'Departemen A',
            'unit_kerja' => 'Unit Kerja A',
            'alamat' => 'Jl. Dr. Cipto no.2 Surabaya',
            'telepon' => '082120934121',
            'type' => 'Non-Organik',
        ]);
        $user->assignRole('user');
    }
}