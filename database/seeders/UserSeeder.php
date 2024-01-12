<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'fname'=>'Admin',
            'lname'=>'Admin',
            'mname'=>'Admin',
            'role'=>'ADMIN',
            'sex'=>'MALE',
            'email'=>'admin@dev.com',
            'password' => Hash::make('aa')
        ],
        [
            'fname'=>'John',
            'lname'=>'Cagadas',
            'mname'=>'Q',
            'role'=>'SELLER',
            'sex'=>'MALE',
            'email'=>'john@dev.com',
            'password' => Hash::make('aa')
        ],
        [
            'fname'=>'Arren',
            'lname'=>'Jacalan',
            'mname'=>'J',
            'role'=>'BUYER',
            'sex'=>'FEMALE',
            'email'=>'arren@dev.com',
            'password' => Hash::make('aa')
        ]
        ];

        User::InsertOrIgnore($data);
    }
}
