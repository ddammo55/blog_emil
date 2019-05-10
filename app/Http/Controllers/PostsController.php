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
       $posts = \App\Post::latest()->paginate(15); 

       return view('posts.index',compact('posts')); 
    }

#|--------------------------------------------------------------------------
#| 게시판 글쓰기 가기
#|--------------------------------------------------------------------------
    public function create()
    {
        return view('posts.create');
    }

#|--------------------------------------------------------------------------
#| 게시판 글 유효성검사, 데이터베이스에 등록하기
#|--------------------------------------------------------------------------
    public function store()
    {
        Post::create(request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:3']
        ]));

        return redirect('/posts');
    }

#|--------------------------------------------------------------------------
#| 게시판 글 상세 페이지
#|--------------------------------------------------------------------------    
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

#|--------------------------------------------------------------------------
#| 게시판 글 수정 페이지
#|--------------------------------------------------------------------------     
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

#|--------------------------------------------------------------------------
#| 게시판 글 데이터베이스에 등록하기
#|--------------------------------------------------------------------------    
    public function update(Request $request, Post $post)
    {
        $post->update(request(['title','description']));

        return redirect('/posts');
    }


#|--------------------------------------------------------------------------
#| 게시판 글 삭제하기
#|-------------------------------------------------------------------------- 
    public function destroy(Post $post)
    {
       $post->delete();

       return redirect('/posts');
    }
}
