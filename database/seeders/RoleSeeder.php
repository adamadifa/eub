<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $adminRole = Role::create(['name' => 'Admin']);
        $dosenRole = Role::create(['name' => 'Dosen']);
        $mahasiswaRole = Role::create(['name' => 'Mahasiswa']);

        // Create Admin User for Testing
        $admin = User::create([
            'name' => 'Administrator EUB',
            'email' => 'admin@eub.test',
            'password' => Hash::make('password123'),
        ]);

        $admin->assignRole($adminRole);

        // Create example Dosen
        $dosen = User::create([
            'name' => 'Dosen Penilai',
            'email' => 'dosen@eub.test',
            'password' => Hash::make('password123'),
        ]);
        $dosen->assignRole($dosenRole);

        // Create example Mahasiswa
        $mhs = User::create([
            'name' => 'Mahasiswa Contoh',
            'email' => 'mhs@eub.test',
            'password' => Hash::make('password123'),
        ]);
        $mhs->assignRole($mahasiswaRole);
    }
}
