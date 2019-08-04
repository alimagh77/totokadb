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
})->middleware('auth');
Route::get('/research', function () {
    return view('research');
})->middleware('auth');
Route::get('/prov', function () {
    return view('prov');
})->middleware('auth');
Auth::routes(['register' => false]);



Route::get('/home','HomeController@index')->middleware('auth');


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
Route::get('/article','ArticleController@index')->middleware('auth');
Route::post('/article','ArticleController@store')->middleware('auth');
Route::get('/article/create','ArticleController@create')->middleware('auth');
Route::get('/article/edit/{id}','ArticleController@edit')->middleware('auth');
Route::post('/article/edit/{id}','ArticleController@update')->name('editArticle')->middleware('auth');
Route::post('/article/destroy/{id}','ArticleController@destroy')->middleware('auth');
Route::get('/article/data','ArticleController@getData')->middleware('auth');
//
Route::get('/tech','TechController@index')->middleware('auth');
Route::post('/tech','TechController@store')->middleware('auth');
Route::get('/tech/create','TechController@create')->middleware('auth');
Route::get('/tech/edit/{id}','TechController@edit')->middleware('auth');
Route::post('/tech/edit/{id}','TechController@update')->name('editTech')->middleware('auth');
Route::post('/tech/destroy/{id}','TechController@destroy')->middleware('auth');
Route::get('/tech/data','TechController@getData')->middleware('auth');
//
Route::get('/industry','IndustryController@index')->middleware('auth');
Route::post('/industry','IndustryController@store')->middleware('auth');
Route::get('/industry/create','IndustryController@create')->middleware('auth');
Route::get('/industry/edit/{id}','IndustryController@edit')->middleware('auth');
Route::post('/industry/edit/{id}','IndustryController@update')->name('editIndustry')->middleware('auth');
Route::post('/industry/destroy/{id}','IndustryController@destroy')->middleware('auth');
Route::get('/industry/data','IndustryController@getData')->middleware('auth');
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
//
Route::get('/file','FileController@index')->middleware('auth');
Route::post('/file','FileController@store')->middleware('auth');
Route::get('/file/create','FileController@create')->middleware('auth');
Route::get('/file/edit/{id}','FileController@edit')->middleware('auth');
Route::post('/file/edit/{id}','FileController@update')->name('editFile')->middleware('auth');
Route::post('/file/destroy/{id}','FileController@destroy')->middleware('auth');
Route::get('/file/data','FileController@getData')->middleware('auth');
//
Route::get('/price','PriceController@index')->middleware('auth');
Route::post('/price','PriceController@store')->middleware('auth');
Route::get('/price/create','PriceController@create')->middleware('auth');
Route::get('/price/edit/{id}','PriceController@edit')->middleware('auth');
Route::post('/price/edit/{id}','PriceController@update')->name('editPrice')->middleware('auth');
Route::post('/price/destroy/{id}','PriceController@destroy')->middleware('auth');
Route::get('/price/data','PriceController@getData')->middleware('auth');
//
Route::get('/suggest','SuggestController@index')->middleware('auth');
Route::post('/suggest','SuggestController@store')->middleware('auth');
Route::get('/suggest/create','SuggestController@create')->middleware('auth');
Route::get('/suggest/edit/{id}','SuggestController@edit')->middleware('auth');
Route::post('/suggest/edit/{id}','SuggestController@update')->name('editSuggest')->middleware('auth');
Route::post('/suggest/destroy/{id}','SuggestController@destroy')->middleware('auth');
Route::get('/suggest/data','SuggestController@getData')->middleware('auth');
//
Route::get('/send','SendController@index')->middleware('auth');
Route::post('/send','SendController@store')->middleware('auth');
Route::get('/send/create','SendController@create')->middleware('auth');
Route::get('/send/edit/{id}','SendController@edit')->middleware('auth');
Route::post('/send/edit/{id}','SendController@update')->name('editSend')->middleware('auth');
Route::post('/send/destroy/{id}','SendController@destroy')->middleware('auth');
Route::get('/send/data','SendController@getData')->middleware('auth');
//
Route::get('/req','RequestController@index')->middleware('auth');
Route::post('/req','RequestController@store')->middleware('auth');
Route::get('/req/create','RequestController@create')->middleware('auth');
Route::get('/req/edit/{id}','RequestController@edit')->middleware('auth');
Route::post('/req/edit/{id}','RequestController@update')->name('editReq')->middleware('auth');
Route::post('/req/destroy/{id}','RequestController@destroy')->middleware('auth');
Route::get('/req/data','RequestController@getData')->middleware('auth');
//
Route::get('/factor','FactorController@index')->middleware('auth');
Route::post('/factor','FactorController@store')->middleware('auth');
Route::get('/factor/create','FactorController@create')->middleware('auth');
Route::get('/factor/edit/{id}','FactorController@edit')->middleware('auth');
Route::post('/factor/edit/{id}','FactorController@update')->name('editFactor')->middleware('auth');
Route::post('/factor/destroy/{id}','FactorController@destroy')->middleware('auth');
Route::get('/factor/data','FactorController@getData')->middleware('auth');


