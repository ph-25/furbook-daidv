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
use Furbook\Cat;
use Furbook\Breed;

// Home page
Route::get('/', function () {
    return redirect('/cats');
});

// List cats
Route::get('/cats', function () {
	// Get all cat
	//DB::enableQueryLog();
	$cats = Cat::all();
	//dd($cats);
	//dd(DB::getQueryLog());

	# Assign variable to view

	// C1 use array
	//return view('cats/index', array('cats' => $cats));

	// C2 use compact function
	//return view('cats/index', compact('cats'));

	// C3 use with function
	return view('cats/index')->with('cats', $cats);
});

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
Route::get('/cats/{id}', function ($id) {
    echo 'Cat #' . $id;
})->where('id', '[0-9]+');

// Show page create new cat
Route::get('/cats/create', function(){
	return view('cats.create');
});

// Insert new cat
Route::post('/cats', function(){
	dd(Request::all());
});
