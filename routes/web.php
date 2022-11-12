<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('member');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/addblog', [App\Http\Controllers\BlogController::class, 'addblog'])->name('addblog');
Route::post('/saveblog', [App\Http\Controllers\BlogController::class, 'saveblog'])->name('saveblog');
Route::get('/updateblogstatus/{id}/{status}', [App\Http\Controllers\BlogController::class, 'updateblogstatus'])->name('updateblogstatus');
//Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');