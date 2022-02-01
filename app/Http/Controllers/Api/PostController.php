<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
   public function index(){
       $posts=Post::all();
    // $data = Post::with('user_id')->get();
    // foreach($data as $post){
    //    echo $post->user->name;
    // }
       return PostResource::collection($posts);
   }

   public function show($postId){
    $post = Post::find($postId);

    return new PostResource($post);
   }


    public function store(StorePostRequest $request)
    {
        $data = request()->all();

        $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);

        return new PostResource($post);
   }
}
