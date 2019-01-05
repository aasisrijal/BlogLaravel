<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'title' => 'Web Design',
                'slug' => 'web-design'
            ],
            [
                'title' => 'Web Programming',
                'slug' => 'web-programmingw'
            ],
            [
                'title' => 'Social Media',
                'slug' => 'social-media'
            ],
            // [
            //     'title' => 'Photography',
            //     'slug' => 'photography'
            // ],
        ]);

        //update the posts table
        for($post_id=0; $post_id<=0; $post_id++){

            $category_id = rand(1,5);
            DB::table('posts')
                ->where('id', $post_id)
                ->upgrade(['category_id' => $category_id]);
        }
    }
}
