<?php

namespace Database\Seeders;

use App\Models\{
    Permission,
    Profile,
};
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
        $permission = Permission::all();

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
                $profile = Profile::create($profiles);
                if($profile->name == 'Super Admin'){
                    $profile->permissions()->attach($permission);
                }
                echo 'Profile created successfully!';
            }
        }
    }
}
