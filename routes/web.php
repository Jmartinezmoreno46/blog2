<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class , 'index'])->name('posts.index');   /* Asi creo la ruta para un controlador y le paso el metodo 
                                                        que quiero en este caso index y de paso le damos un nombre
                                                        siempre que coincida con el nombre que le pasamos en nuestro archivo route*/


Route::get('posts/{post}', [PostController::class , 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class , 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class , 'tag'])->name('posts.tag');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
