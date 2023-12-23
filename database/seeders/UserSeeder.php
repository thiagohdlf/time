<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            'name' => 'Thiago',
            'email' => 'thiago@teste',
            'password' => 123
        ];

        if(User::where('email', $data['email'])->first()){
            echo "email already exists!";
        } else {
            User::create($data);
            echo "user created successfully!";
        }
    }
}
