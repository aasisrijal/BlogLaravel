<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Post;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //to make the blogcontroller clean by reducing the categories list code here
        view()->composer('layouts.sidebar', function($view){
            $categories = Category::with(['posts' => function($query){
                $query->published();
            }])->orderBy('title', 'asc')->get();

            return $view->with('categories', $categories);

        });

        view()->composer('layouts.sidebar', function($view){
            $popularPosts  = Post::published()->popular()->take(3)->get();
            return $view->with('popularPosts', $popularPosts);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
