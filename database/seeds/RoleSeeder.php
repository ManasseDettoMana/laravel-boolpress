<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleList = ['thaSupreme','Amministratore', 'Editore', 'Redattore', 'Scrittore', 'Lmao', 'Lettore'];

        for($i = 1; $i <= 7; $i++)
        {
            $newRole = new Role();
            $newRole->rank = $i;
            $newRole->name = $roleList[$i-1];

            $newRole->save();
        }

    }
}
