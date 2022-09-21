<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function () {
    Route::post('user/login','AuthController@login');
    Route::post('user/register','AuthController@register');
    Route::post('post/lists','DataController@postList');
    Route::post('category/lists','DataController@categoryList');
    Route::post('post/search','DataController@postSearch');
    Route::post('category/search','DataController@categorySearch');

    Route::middleware('auth:sanctum')->group(function(){
        // Route::post('category/lists','DataController@categoryList');
        // Route::post('sub-category/lists','DataController@subCategoryList');
        // Route::post('company/lists','DataController@companyList');
    });
});
