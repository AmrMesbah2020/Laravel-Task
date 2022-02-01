<?php

namespace App\Http\Controllers;



use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function index()
    {
        // $allPosts = Post::SimplePaginate(3);
        $posts = Post::SimplePaginate(10);
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

    public function store(StorePostRequest $reqest){
        $data = $reqest->all();
        // dd($data);
        $path=$reqest->file('photo')->store('post photos');
        // dd($path);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            'photo'=>$path,
        ]);


       return redirect()->route('posts.index');
    }

    public function show($slug){
        $post = Post::where('slug',$slug) ->first();
        return view('posts.view',['post' =>$post]);
    }

    public function edit($slug){
        $post = Post::where('slug',$slug) ->first();
        // $user=User::find($post['user_id']);
        return view('posts.edit',['post' => $post]);
    }

    public function update(StorePostRequest $request){
        // dd($request);
        $data = Post::find($request->id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->slug=$request->slug;
        $data->save();
       return redirect()->route('posts.index');
    }

    public function destroy($postID){
        $data=Post::find($postID);
        $data->delete();
        return redirect()->route('posts.index');
    }



}
