<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

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
        //carbon to create a date
        $date = Carbon::create(2018,12,30,8);

        //faker object to create fake data
        $faker = Factory::create();

        for($i=0; $i<10; $i++) {

            $image = 'Post_Image_'.rand(1,5). '.jpg';
            $date->addDays(1);

            $posts[] = [
                'author_id' => rand(1,3),
                'title' => $faker->sentence(rand(5,10)),
                'excerpt' => $faker->text(rand(150,300)),
                'body' => $faker->paragraph(rand(5,10)),
                'slug' => $faker->slug(),
                'image' => rand(0,1) == 1 ? $image :NULL,
                'created_at' => clone($date),
                'updated_at' => clone($date),
                'published_at' => rand(1,0)==0 ? NULL : $date->addDays( $i+ rand(4,10))

            ];
        }

        //insert the  posts data
        DB::table('posts')->insert($posts);

    }
}
