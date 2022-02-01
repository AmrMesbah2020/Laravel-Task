<?php
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');

Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

Route::post('/posts',[PostController::class, 'store'])->name('posts.store');

Route::get('/posts/delete/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::get('/posts/edit/{post}',[PostController::class,'edit'])->name('posts.edit');

Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::post('posts/update',[PostController::class,'update'])->name('posts.update');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.auth');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    $post = User::create([

        'name' => $user['name'],
        'email' => $user['email'],
        'password'=>"1425"
    ]);

    return redirect(route('posts.index'));

});
