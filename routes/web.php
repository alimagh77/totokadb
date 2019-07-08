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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/company','CompanyController@index');
Route::post('/company','CompanyController@store');
Route::get('/company/create','CompanyController@create');
Route::get('/company/edit/{id}','CompanyController@edit');
Route::post('/company/edit/{id}','CompanyController@update');
Route::post('/company/destroy/{id}','CompanyController@destroy');
//
Route::get('/customer','CustomerController@index');
Route::post('/customer','CustomerController@store');
Route::get('/customer/create','CustomerController@create');
Route::get('/customer/edit/{id}','CustomerController@edit');
Route::post('/customer/edit/{id}','CustomerController@update');
Route::post('/customer/destroy/{id}','CustomerController@destroy');
//
Route::get('/meeting','MeetingController@index');
Route::post('/meeting','MeetingController@store');
Route::get('/meeting/create','MeetingController@create');
Route::get('/meeting/edit/{id}','MeetingController@edit');
Route::post('/meeting/edit/{id}','MeetingController@update');
Route::post('/meeting/destroy/{id}','MeetingController@destroy');
//
Route::get('/product','ProductController@index');
Route::post('/product','ProductController@store');
Route::get('/product/create','ProductController@create');
Route::get('/product/edit/{id}','ProductController@edit');
Route::post('/product/edit/{id}','ProductController@update');
Route::post('/product/destroy/{id}','ProductController@destroy');
//
Route::get('/manufacturer','ManufacturerController@index');
Route::post('/manufacturer','ManufacturerController@store');
Route::get('/manufacturer/create','ManufacturerController@create');
Route::get('/manufacturer/edit/{id}','ManufacturerController@edit');
Route::post('/manufacturer/edit/{id}','ManufacturerController@update');
Route::post('/manufacturer/destroy/{id}','ManufacturerController@destroy');