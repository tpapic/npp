<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'email' => 'admin@gmail.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'role_id' => 1
            ],
            [
            'email' => 'user@gmail.com',
            'first_name' => 'Tom',
            'last_name' => 'Tomic',
            'role_id' => 2
            ]
        ];

        foreach($users as $user) {
            factory(User::class, 'seed')->create($user);
        }
    }
}
