<?php

use Illuminate\Database\Seeder;
use App\Util\Permission;
use App\Role;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* actions for admin */
        $allActions = [
            /* dashboard */
            'dashboard/module',

            /* users */
            'users/module',
            'users/index',
            'users/show',
            'users/store',
            'users/update',
            'users/destroy',

            'pictures/module',
            'pictures/index',
            'pictures/show',
            'pictures/store',
            'pictures/update',
            'pictures/destroy',
        ];

        $userActions = [
            /* dashboard */
            'dashboard/module',
            
            /* pictures */
            'pictures/module',
            'pictures/index',
            'pictures/show',
            'pictures/store',
            'pictures/update',
            'pictures/destroy',

            'settings/module',
            'settings/update'
        ];

        $actions = [
          'Admin' => ['actions' => $allActions],
          'User' => ['actions' => $userActions],
        ];

        $roles = Role::all();
        $roles->each(function($role) use (&$actions) {
          if(isset($actions[$role->name])) {
            Permission::addActionsForRole(
              $actions[$role->name]['actions'],
              1, // set everything from actions to 1
              $role->id
            );
          }
        });

    }
}
