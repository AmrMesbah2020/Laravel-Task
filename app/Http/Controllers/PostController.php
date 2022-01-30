<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }
    
    public function create(){
        $users = User::all();

        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(){
        $data = request()->all();
        
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);


       return redirect()->route('posts.index');
    }

    public function show($postID){
        $post = Post::find($postID);
        return view('posts.view',['post' =>$post]);
    }

    public function edit($postID){
        $post = Post::find($postID);
        // $user=User::find($post['user_id']);
        return view('posts.edit',['post' => $post]);
    }

    public function update(Request $req){
        $data = Post::find($req->id);
        $data->title=$req->title;
        $data->description=$req->description;
        $data->save();
       return redirect()->route('posts.index');
    }

    public function destroy($postID){
        $data=Post::find($postID);
        $data->delete();
        return redirect()->route('posts.index');
    }



}
