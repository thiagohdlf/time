<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'view-user',
                'description' => 'Visualiza usuários',
            ],
            [
                'name' => 'edit-user',
            ],
            [
                'name' => 'create-user',
                'description' => 'Cria Usuários'
            ],
        ];

        foreach($data as $permissions){
            if(Permission::where('name', $permissions['name'])->count()){
                $permission = Permission::where('name', $permissions['name'])->first();
                $permission->update($permissions);
                echo 'permission updated successfully!';
            }else{
                Permission::create($permissions);
                echo 'permission created successfully!';
            }
        }
    }
}
