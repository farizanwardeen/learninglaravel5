<?php

Route::get('foo','FooController@foo');

Route::get('/', function() {
	return 'Home Page';
});

Route::get('about','PagesController@about');
Route::get('contact','PagesController@contact');

// Route::get('articles','ArticlesController@index');
// Route::get('articles/create','ArticlesController@create');
// Route::get('articles/{id}','ArticlesController@show');
// Route::post('articles','ArticlesController@store');
// Route::post('articles/{id}/edit','ArticlesController@edit');


Route::resource('articles','ArticlesController');

Route::get('tags/{tags}', 'TagsController@show');

Route::controllers ([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
Route::get('foo', ['middleware' => 'manager', function()
{
	return 'this page may only be viewed by managers';
}]);
*/
