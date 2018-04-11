<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route INDEX USER
Route::get('/', 'UserIndexController@index');
Route::get('event','UserIndexController@event');

Route::group(['prefix'=>'users', 'middleware'=>['auth', 'role:member']], function(){
  Route::get('/','UserIndexController@myevent');
  Route::get('{id}/detailevent','UserIndexController@detailevent');
  Route::post('{id}/daftar', 'UserIndexController@daftar');
  Route::post('{id}', 'UserIndexController@destroy');
});



//Route ADMIN
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function(){
  Route::get('/', function(){
    return view('admin.dashboard');
  });
  Route::get('/logout', 'UsersController@logout');

//Route EVENT START
  Route::group(['prefix'=>'event'], function(){
    Route::get('/', 'EventController@index');
    Route::get('/create', 'EventController@create');
    Route::post('/', 'EventController@store');
    Route::get('/{id}/edit', 'EventController@edit');
    Route::put('{id}', 'EventController@update');
    Route::delete('{id}', 'EventController@destroy');
  });
//Route EVENT END
//Route EVENT USERS
  // Route::group(['prefix'=>'users'], function(){
    Route::resource('users','BebasController');
  // });
//Route USERS END
//Route PESERTA USERS
  Route::group(['prefix'=>'peserta'], function(){
    Route::get('/', 'PesertaController@index');
    Route::get('/{id}/view', 'PesertaController@view');
    Route::post('/{id}', 'PesertaController@destroy');
  });
//Route PESERTA END
});
//Route ADMIN END

Auth::Routes();
// Route::get('/coding', 'EventController@login');
Route::get('/home', 'HomeController@index')->name('home');
