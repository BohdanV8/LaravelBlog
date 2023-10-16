<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'MainController@authorization');

Route::get('/home', 'MainController@home')->name('home');

Route::post('/auth', 'MainController@auth')->name('auth');

Route::get('/about', 'MainController@about');

Route::get('/registration', 'MainController@registration');

Route::get('/otherPosts', 'MainController@otherPosts');

Route::get('/addPost', 'MainController@addPost');

Route::post('/newPost', 'MainController@newPost');

Route::post('/newUser', 'MainController@newUser');

Route::post('/searchPost', 'MainController@searchPost');
// Route::get('/user/{id}/{name}', function ($id, $name) {
//     return 'ID: ' . $id . ' Name: ' . $name;
// });