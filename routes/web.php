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
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company','CompanyController@index')->middleware('auth');
Route::post('/company','CompanyController@store')->middleware('auth');
Route::get('/company/create','CompanyController@create')->middleware('auth');
Route::get('/company/edit/{id}','CompanyController@edit')->middleware('auth');
Route::post('/company/edit/{id}','CompanyController@update')->name('editCompany')->middleware('auth');
Route::post('/company/destroy/{id}','CompanyController@destroy')->middleware('auth');
Route::get('/company/data','CompanyController@getData')->middleware('auth');
//
Route::get('/customer','CustomerController@index')->middleware('auth');
Route::post('/customer','CustomerController@store')->middleware('auth');
Route::get('/customer/create','CustomerController@create')->middleware('auth');
Route::get('/customer/edit/{id}','CustomerController@edit')->middleware('auth');
Route::post('/customer/edit/{id}','CustomerController@update')->name('editCustomer')->middleware('auth');
Route::post('/customer/destroy/{id}','CustomerController@destroy')->middleware('auth');
Route::get('/customer/data','CustomerController@getData')->middleware('auth');
//
Route::get('/meeting','MeetingController@index')->middleware('auth');
Route::post('/meeting','MeetingController@store')->middleware('auth');
Route::get('/meeting/create','MeetingController@create')->middleware('auth');
Route::get('/meeting/edit/{id}','MeetingController@edit')->middleware('auth');
Route::post('/meeting/edit/{id}','MeetingController@update')->name('editMeeting')->middleware('auth');
Route::post('/meeting/destroy/{id}','MeetingController@destroy')->middleware('auth');
Route::get('/meeting/data','MeetingController@getData')->middleware('auth');
//
Route::get('/product','ProductController@index')->middleware('auth');
Route::post('/product','ProductController@store')->middleware('auth');
Route::get('/product/create','ProductController@create')->middleware('auth');
Route::get('/product/edit/{id}','ProductController@edit')->middleware('auth');
Route::post('/product/edit/{id}','ProductController@update')->name('editProduct')->middleware('auth');
Route::post('/product/destroy/{id}','ProductController@destroy')->middleware('auth');
Route::get('/product/data','ProductController@getData')->middleware('auth');
//
Route::get('/manufacturer','ManufacturerController@index')->middleware('auth');
Route::post('/manufacturer','ManufacturerController@store')->middleware('auth');
Route::get('/manufacturer/create','ManufacturerController@create')->middleware('auth');
Route::get('/manufacturer/edit/{id}','ManufacturerController@edit')->middleware('auth');
Route::post('/manufacturer/edit/{id}','ManufacturerController@update')->name('editManufacturer')->middleware('auth');
Route::post('/manufacturer/destroy/{id}','ManufacturerController@destroy')->middleware('auth');
Route::get('/manufacturer/data','ManufacturerController@getData')->middleware('auth');



