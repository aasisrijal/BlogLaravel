<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $categories = Category::with(['posts' => function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();        
        
        //$posts= Post::with('writer')->latest()->get();

        //creating scope
        //$posts= Post::with('writer')->latestFirst()->get();

        //displaying limited posts use paginate or simplePaginate
        // $posts= Post::with('writer')->latestFirst()->paginate(4);

        //\DB::enableQueryLog();
        $posts= Post::with('writer')->latestFirst()->published()->simplePaginate(4);

        // return $posts;
         return view('blog.index')->with('posts', $posts)->with('categories', $categories);
        //dd(\DB::getQueryLog());
    }

    public function category($id){

        $categories = Category::with(['posts' => function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();

        $posts= Post::with('writer')
            ->latestFirst()
            ->published()
            ->where('category_id', $id)
            ->simplePaginate(4);

        return view('blog.index')->with('posts', $posts)->with('categories', $categories);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::published()->findOrFail($id);
        return view('blog.show')->with('post', $post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
