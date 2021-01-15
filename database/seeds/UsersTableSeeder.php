<?php

use Illuminate\Support\Facades\Hash;
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
        User::truncate();

        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();

        $publisherRole = Role::where('name', 'publisher')->first();

        $userRole = Role::where('name', 'user')->first();


        Role::create(['name' => 'admin']);

        Role::create(['name' => 'publisher']);

        Role::create(['name' => 'user']);


        $admin = User::create([
            'name' => 'Admin User',

            'email' => 'admin@test.com',

            'password' => Hash::make('password')
        ]);


        $publisher = User::create([
            'name' => 'publisher User',

            'email' => 'publisher@test.com',

            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'Generic User',

            'email' => 'user@test.com',

            'password' => Hash::make('password')
        ]);


        // the following roles() meth is from the Role model

        // NB: a role belongsToMany('users');

        // the following attach() meth assign a role to a particular user

        $admin->roles()->attach($adminRole);

        $publisher->roles()->attach($publisherRole);

        $user->roles()->attach($userRole);
    }
}
