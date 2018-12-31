<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //to reset the table
        DB::table('posts')->truncate();

        //generate 10 posts data

        $posts=[];
        //faker object to create fake data
        $faker = Factory::create();

        for($i=0; $i<10; $i++) {

            $image = 'Post_Image_'.rand(1,5). '.jpg';
            $date  = date('Y-m-d H:i:s', strtotime('2018-12-31 09:00:00'));

            $posts[] = [
                'author_id' => rand(1,3),
                'title' => $faker->sentence(rand(5,10)),
                'excerpt' => $faker->text(rand(150,300)),
                'body' => $faker->paragraph(rand(5,10)),
                'slug' => $faker->slug(),
                'image' => rand(0,1) == 1 ? $image :NULL,
                'created_at' => $date,
                'updated_at' => $date

            ];
        }

        //insert the  posts data
        DB::table('posts')->insert($posts);

    }
}
