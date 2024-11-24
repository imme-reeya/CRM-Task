<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Models\Post;
use App\Http\Controllers\ApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//POst
Route::get('/posts', [ApiController::class, 'getAllPosts']);

//create news and events/ article
Route::post('create-article', [ApiController::class, 'createArticle']);

//fetch articles
Route::get('show-articles', [ApiController::class, 'showArticles']);

//get any individual data -detail
Route::get('show-article-detail/{id}', [ApiController::class, 'ShowArticleDetail']);

//Updating article
Route::put('update-article/{id}', [ApiController::class, 'updateArticle']);

//delete article
Route::delete('delete-article/{id}', [ApiController::class, 'deleteArticle']);