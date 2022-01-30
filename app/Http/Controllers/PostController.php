<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['title' => 'First Post', 'posted_by'=> 'Ahmed', 'created_at' => '2022-01-20'],
            ['title' => 'Second Post', 'posted_by'=> 'Mohamed', 'created_at' => '2022-01-20'],
            ['title' => 'Third Post', 'posted_by'=> 'Ali', 'created_at' => '2022-01-20'],
        ];

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
    
    public function create(){
        return view('posts.create');
    }

    public function store(){
       return redirect()->route('posts.index');
    }

    public function show($postID){
        return view('posts.view');
    }



}
