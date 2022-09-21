<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\ListController;
use App\Http\Controllers\Backend\Admin\PostController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\TrendPostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Backend\Admin')
    ->middleware(['auth:web',config('jetstream.auth_session'),'verified'
])->group(function () {
    
    Route::get('/dashboard',[ProfileController::class,'index'])->name('dashboard');
    Route::post('/profile/update',[ProfileController::class,'updateProfile'])->name('profile_update');
    Route::get('/change-password',[ProfileController::class,'changePassword'])->name('change_password');
    Route::post('/update-password',[ProfileController::class,'updatePassword'])->name('update_password');
   
    Route::resource('lists','ListController',['except' => 'show', 'create', 'store', 'update']);
    Route::post('/lists/search','ListController@searchList')->name('lists.search');     
    Route::resource('categories','CategoryController',['except' => 'show']);
    Route::resource('sub_categories','SubCategoryController',['except' => 'show']);
    Route::resource('posts','PostController');
    Route::resource('trend-posts','TrendPostController');
    Route::resource('company-types','CompanyTypeController');
    Route::resource('companies','CompanyController');
    Route::resource('customers','CustomerController',['except' => 'show']);

    Route::get('/data/sub_categories','DataController@subCategories');
    
});
