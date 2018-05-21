<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@wiseyes.com',
            'address' => 'Petaling Jaya',
            'postcode' => '40000',
            'state' => 'Selangor',
            'roles' => 1,
            'password' => Hash::make('wiseyes'),
        ]);
    }
}
