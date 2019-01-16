<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        
        //$posts= Post::with('writer')->latest()->get();

        //creating scope
        //$posts= Post::with('writer')->latestFirst()->get();

        //displaying limited posts use paginate or simplePaginate
        // $posts= Post::with('writer')->latestFirst()->paginate(4);

        //\DB::enableQueryLog();
        $posts = Post::with('writer')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate(4);
        
        //  $posts=Post::with('writer')->get();
         return view('blog.index')->with('posts', $posts);
                //dd(\DB::getQueryLog());
    }

    public function category(Category $category){

        $categoryName = $category->title;  

        $posts= $category->posts()
                        ->with('writer')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate(4);

        //return view('blog.index')->with('posts', $posts)->with('categories', $categories);
        return view('blog.index', compact('posts', 'categoryName'));

    }

    public function writer(User $writer){

        $writerName = $writer->name; 
        $posts= $writer->posts()
                    ->with('category')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate(4);

        
         return view('blog.index', compact('posts', 'writerName'));

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
       //update post view_count by 1
        //1st
    //    $viewCount = $post->view_count + 1;
    //    $post->update(['view_count' => $viewCount]);

        //2nd
        $post->increment('view_count');
        return view('blog.show', compact('post'));

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
