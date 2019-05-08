<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

#|--------------------------------------------------------------------------
#| 게시판 메인가기
#|--------------------------------------------------------------------------
    public function index()
    {
       $posts = \App\Post::all(); 

       return view('posts.index',compact('posts')); 
    }

#|--------------------------------------------------------------------------
#| 게시판 글쓰기 가기
#|--------------------------------------------------------------------------
    public function create()
    {
        return view('posts.create');
    }



    public function store()
    {
        Post::create(request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:3']
        ]));

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
