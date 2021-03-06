<?php

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
Route::group(['middleware'=>['web']], function()
{

Route::resource('posts','postController');

//multiple image upload
Route::get('image','imageController@index');
Route::post('image-submit','imageController@store');


Route::get('Contact', 'pagesController@getContact');

Route::get('About', 'pagesController@getAbout');

Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);

Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');

Route::resource('categories','categoryController',['except'=>['create']]);

Route::get('/','pagesController@getIndex');

Auth::routes();

//route for the Album
Route::resource('album','AlbumController');


});

// Route::get('/', 'pagesController@getIndex')->name('index');
