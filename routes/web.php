<?php

use App\Book;
use App\Category;

Route::group(['middleware' => 'checkLogin'], function() {
	Route::resource('/bookCRUD', 'BookController');
	Route::resource('/authorCRUD', 'AuthorController');
	Route::resource('/category', 'CategoryController');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

