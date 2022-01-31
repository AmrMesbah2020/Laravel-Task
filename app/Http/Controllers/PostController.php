<?php

namespace App\Http\Controllers;



use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;


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

    public function store(StorePostRequest $req){
        $data = $req->all();
        // dd($data);
        $path=$req->file('photo')->store('post photos');
        // dd($path);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            'photo'=>$path,
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

    public function update(StorePostRequest $request){
        // dd($request);
        $data = Post::find($request->id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();
       return redirect()->route('posts.index');
    }

    public function destroy($postID){
        $data=Post::find($postID);
        $data->delete();
        return redirect()->route('posts.index');
    }



}
