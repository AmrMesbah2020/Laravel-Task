<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<50;$i++){
        Post::insert([
            'title'=>$slug=Str::random(10),
            'description'=>Str::random(50),
            'user_id'=>User::all()->random()->id,
            'slug' =>Str::of($slug)->slug('-'),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
    }
}
