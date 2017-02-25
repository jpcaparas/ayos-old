<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creates the admin user
        \DB::table('users')->insert(
            [
                'name' => 'Admin user',
                'email' => 'admin@local.dev',
                'password' => \Hash::make('admin')
            ]
        );
    }
}
