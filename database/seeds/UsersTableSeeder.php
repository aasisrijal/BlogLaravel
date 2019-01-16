<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        //generate the 3 users/authors
        $faker = Factory::create();
        DB::table('users')->insert([
            [
                'name' => 'Ram Thapa',
                'slug' => 'ram-thapa',
                'email' => 'ram@gmail.com',
                'password' => bcrypt('123456'),
                'bio' => $faker->text(rand(150,200))
            ],
            [
                'name' => 'Sita Aryal',
                'slug' => 'sita-aryal',
                'email' => 'sita@gmail.com',
                'password' => bcrypt('123456'),
                'bio' => $faker->text(rand(150,200))
            ],
            [
                'name' => 'Harke Bahadur',
                'slug' => 'harke-bahadur',
                'email' => 'harkeph@gmail.com',
                'password' => bcrypt('123456'),
                'bio' => $faker->text(rand(150,200))
            ],
        ]);
    }
}
