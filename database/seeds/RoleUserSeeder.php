<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Role;
use App\User;
class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $role_ids = Role::pluck('id')->toArray();

        foreach($users as $user)
        {   
            $user->roles()->attach(Arr::random($role_ids));
            $user->save();
        }
    }
}
