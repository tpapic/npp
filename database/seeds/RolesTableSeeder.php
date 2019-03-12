<?php

use Illuminate\Database\Seeder;
use App\Util\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'User'
        ];
        Permission::addRoles($roles);
    }
}
