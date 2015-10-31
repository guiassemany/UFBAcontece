<?php

Route::get('/', function () {
    return view('welcome');
});


// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'auth'], function()
    {

      Route::get('/', 'AdminController@index');

      Route::get('/eventos', 'EventosController@index');
      

      //Faz o Logout
      Route::get('auth/logout', 'Admin\Auth\AuthController@getLogout');

    });

    //Rotas que só podem ser visitadas caso o usuário não esteja logado.
    Route::group(['middleware' => 'guest'], function()
    {
      Route::get('auth/login', 'Admin\Auth\AuthController@getLogin');
      Route::post('auth/login', 'Admin\Auth\AuthController@postLogin');
    });


});
