<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublishController;

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

// Route::get('/', function () {
//     return view('welcome');
// });

//post Routes
Route::get('/', [PagesController::class, 'gallery'])->name('gallery');
Route::get('/posts/{slug}', [PagesController::class, 'galleryDetails'])
    ->name('post.details');

//Published posts
Route::get('/publish', [PublishController::class, 'index'])->name('publish.index');
Route::get('/publish/{title}', [PublishController::class, 'publishDetails'])
    ->name('publish.details');

//contact form
//display the form in view 
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
//post data to the database
Route::post('/contactHandle', [PagesController::class, 'handleContact'])->name('contact.handle');

//Auth/Registration
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route::get("/", [WelcomeController::class, "welcome"])->name("welcome");

//voyager admin 
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/', [PagesController::class, 'dashboard'])->name("voyager.dashboard");
});
