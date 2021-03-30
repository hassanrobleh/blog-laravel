<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\GithubController;

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

Route::get('/github', function() {
    dd(env('GITHUB_CLIENT_ID'), env('GITHUB_CLIENT_SECRET'), env('GITHUB_REDIRECT'));
});

Route::get('/', [ MainController::class, 'home'])->name('home');

Route::get('/articles', [ MainController::class, 'index'])->name('articles');
Route::get('/articles/{article:slug}', [ MainController::class, 'show'])->name('article');

Auth::routes();

// Route::prefix('admin')->middleware('admin')->group(function() {
    
    // Route::get('/articles', [ ArticleController::class, 'index'])->name('articles.index');
    // Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    // Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
    // Route::delete('/articles/{article}/delete', [ArticleController::class, 'delete'])->name('articles.delete');
    // Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    // Route::put('/articles/{article}/update', [ArticleController::class, 'update'])->name('articles.update');

    // Route::resource('articles', ArticleController::class)->except([
    //     'show'
    // ]);
// });


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/auth/github', [ GithubController::class, 'auth'])->name('github.auth');
Route::get('/auth/github/redirect', [ GithubController::class, 'redirect'])->name('github.redirect');

