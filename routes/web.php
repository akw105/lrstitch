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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/action-denied', 'HomeController@action_denied')->name('action-denied');
Route::get('/site-news','PostController@index');
Route::get('/site-news/{slug}','PostController@show');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile/{username}', 'ProfileController@getProfile');
    Route::get('/profile/{username}/edit-profile', 'ProfileController@editProfile');
    Route::get('/profile/{username}/threads', 'StashController@index');
    Route::get('/profile/{username}/threads/dmc', 'StashController@indexdmc');
    Route::get('/profile/{username}/threads/anchor', 'StashController@indexanchor');
    Route::get('/profile/{username}/threads/cxc', 'StashController@indexcxc');
    Route::get('/profile/{username}/threads/sullivans', 'StashController@indexsullivans');
    Route::get('/profile/{username}/threads/batch', 'StashController@indexbatch');
    Route::get('/profile/{username}/fabrics', 'FabricController@index');
    Route::get('/profile/{username}/projects', 'ProjectController@index');
    Route::get('/profile/{username}/wishlist', 'ProjectController@wishlist');
    Route::get('/profile/{username}/shopping-list', 'StashController@shopping_list');
    Route::post('/savefabric', 'FabricController@add');
    Route::post('/saveproject', 'ProjectController@add');
    Route::post('/updatefabric', 'FabricController@update');
    Route::delete('/fabric/delete/{id}', 'FabricController@delete');
    Route::post('/stash/update', 'StashController@update');
    Route::post('/stash/bulkupdate', 'StashController@bulkupdate');
    Route::get('/search','SearchController@search');
    Route::get('/categorysearch','SearchController@categorysearch');
    Route::get('/delete-user/{name}','ProfileController@confirm');
    Route::delete('/delete-user/{id}','ProfileController@destroy');
    Route::get('/upload-file', 'FileUpload@createForm');
    Route::post('/upload-file', 'FileUpload@fileUpload')->name('fileUpload');
    
    Route::get('/project/api/autofill','ProjectController@getAutocompleteData'); 
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// check for logged in user
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', 'PostController@create');
    Route::get('/admin/site-news', 'PostController@list');
    Route::get('/admin/import-threads', 'ThreadImportController@importpage');
    Route::post('/admin/importing-threads', 'ThreadImportController@importprocess');
  });
  