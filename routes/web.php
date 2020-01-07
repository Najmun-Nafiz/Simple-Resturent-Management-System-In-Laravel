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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/reservation', 'ReservationController@reserve')->name('customer.reservation');
Route::post('/contact', 'ContactController@contact')->name('customer.contact');

Auth::routes();


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin','as' => 'admin.'], function(){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/', 'DashboardController@index')->name('admin');

	//Slider Controller Start Now................
	Route::resource('/slider', 'SliderController');
	Route::get('/slider/create', 'SliderController@create')->name('slider.craete');
	Route::post('/slider/store', 'SliderController@store')->name('slider.store');
	Route::get('/slider/edit/{id}', 'SliderController@edit')->name('slider.edit');

	Route::post('/slider/update/{id}', 'SliderController@update')->name('slider.update');
	Route::get('/slider/delete/{id}', 'SliderController@destroy')->name('slider.destroy');



	//Category Controller Start Now................
	Route::resource('/category', 'CategoryController');
	Route::get('/category/create', 'CategoryController@create')->name('category.craete');
	Route::post('/category/store', 'CategoryController@store')->name('category.store');
	Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');

	Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
	Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');



	//Item Controller Start Now................
	Route::resource('/item', 'ItemController');
	Route::get('/item/create', 'ItemController@create')->name('item.craete');
	Route::post('/item/store', 'ItemController@store')->name('item.store');
	Route::get('/item/edit/{id}', 'ItemController@edit')->name('item.edit');

	Route::post('/item/update/{id}', 'ItemController@update')->name('item.update');
	Route::get('/item/delete/{id}', 'ItemController@destroy')->name('item.destroy');



	//Item Controller Start Now................
	Route::resource('/reservation', 'ItemController');
	Route::get('/reservation', 'ReservationController@index')->name('reservation.index');
	Route::get('/reservation/show/{id}', 'ReservationController@show')->name('reservation.show');
	Route::get('/reservation/confirm/{id}', 'ReservationController@confirm')->name('reservation.confirm');
	Route::get('/reservation/not_confirm/{id}', 'ReservationController@not_confirm')->name('reservation.not_confirm');

	Route::get('/reservation/delete/{id}', 'ReservationController@destroy')->name('reservation.destroy');


	//Message Controller Start Now................
	Route::get('/message', 'ContactController@index')->name('message.index');

	Route::get('/message/show/{id}', 'ContactController@show')->name('message.show');
	Route::get('/message/reply/{id}', 'ContactController@reply')->name('message.reply');
	Route::get('/message/send/{id}', 'ContactController@send')->name('message.send');
	
	Route::get('/message/delete/{id}', 'ContactController@destroy')->name('message.destroy');



});	
