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
        //reset the users table
        // DB::table('users')->truncate();

        //generate the 3 users/authors
        DB::table('users')->insert([
            [
                'name' => 'Ram Thapa',
                'email' => 'ram@gmail.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Sita Aryal',
                'email' => 'sita@gmail.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Harke Bahadur',
                'email' => 'harkeph@gmail.com',
                'password' => bcrypt('123456')
            ],
        ]);
    }
}
