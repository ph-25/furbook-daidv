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
use Furbook\Breed;

DB::enableQueryLog();

// Home page
Route::get('/', function () {
    return redirect('/cats');
});

// List cats
Route::get('/cats', ['uses' => 'CatController@index', 'as' => 'cat.index']);

// Display all cat belong to breed name
Route::get('/cats/breeds/{name}', function($name){
	$breed = Breed::with('cats')
	->where('name', $name)
	->first();
	return view('cats.index')
	->with('breed', $breed)
	->with('cats', $breed->cats);
});

// Detail cat has id?
Route::get('/cats/{cat}', ['uses' => 'CatController@show', 'as' => 'cat.show'])->where('cat', '[0-9]+');

// Show page create new cat
Route::get('/cats/create', ['uses' => 'CatController@create', 'as' => 'cat.create']);

// Insert new cat
Route::post('/cats', ['uses' => 'CatController@store', 'as' => 'cat.store']);

// Show page edit a cat
Route::get('/cats/{id}/edit', ['uses' => 'CatController@edit', 'as' => 'cat.edit']);

// Update a cat
Route::put('/cats/{id}', ['uses' => 'CatController@update', 'as' => 'cat.update']);

// Delete a cat
Route::delete('/cats/{id}', ['uses' => 'CatController@destroy', 'as' => 'cat.destroy']);
