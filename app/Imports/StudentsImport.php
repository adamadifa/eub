<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::updateOrCreate(
            ['email' => $row['email']],
            [
                'name' => $row['nama'],
                'nim' => $row['nim'],
                'password' => Hash::make($row['nim']),
                'email_verified_at' => now(),
            ]
        );

        if (!$user->hasRole('Mahasiswa')) {
            $user->assignRole('Mahasiswa');
        }

        return $user;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nim' => 'required|string|max:20',
        ];
    }
}
