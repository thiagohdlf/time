<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'Super Admin',
                'description' => 'Usuário super administrador',
            ],
            [
                'name' => 'Admin',
                'description' => 'Usuário administrador',
            ],
            [
                'name' => 'Demostração',
                'description' => 'Usuário de teste',
            ],
        ];

        foreach($data as $profiles){
            if(Profile::where('name', $profiles['name'])->count()){
                $profile = Profile::where('name', $profiles['name'])->first();
                $profile->update($profiles);
                echo 'Profile updated successfully!';
            }else{
                Profile::create($profiles);
                echo 'Profile created successfully!';
            }
        }
    }
}
