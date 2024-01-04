<?php

namespace Database\Seeders;

use App\Models\{
    Profile,
    User,
};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profile = Profile::find(1);
        //
        $data = [
            'name' => 'Thiago',
            'email' => 'thiago@teste',
            'password' => 123
        ];

        /*foreach($data as $user){

        }*/
        if(User::where('email', $data['email'])->first()){
            echo "email already exists!";
        } else {
            $user = User::create($data);
            if($data['email'] == 'thiago@teste'){
                $user->profiles()->attach($profile);
            }
            echo "user created successfully!";
        }
    }
}
