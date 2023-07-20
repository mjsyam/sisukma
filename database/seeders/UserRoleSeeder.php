<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;


class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::get("id");
        $role = Role::get("id");
        $i = 1;
        foreach($users as $user){
            UserRole::create([
                'role_id' => $i,
                'user_id' => $user->id,
            ]);
            if($i < $role->count()){
                $i++;
            }
        }
    }
}
