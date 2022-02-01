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

Route::delete('/posts/delete/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::get('/posts/{slug}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::put('posts/{slug}',[PostController::class,'update'])->name('posts.update');

Route::get('/posts/{slug}',[PostController::class,'show'])->name('posts.show');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.auth');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    return redirect(route('posts.index'));

});
