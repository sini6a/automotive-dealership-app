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

Auth::routes(['register' => false]);

Route::get('', 'HomeController@index')->name('home');
Route::get('rekond', 'HomeController@polish_index')->name('polish_index');
Route::get('verkstad', 'HomeController@service_index')->name('service_index');
Route::get('salj-bil', 'HomeController@sell_vehicle')->name('sell_vehicle');
Route::get('om-oss', 'HomeController@about_us')->name('about_us');
Route::get('kontakt', 'HomeController@contact')->name('contact');
Route::post('kontakt', 'HomeController@sendMail')->name('sendMail');

Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');


Route::resource('customer-sale', 'SellVehicleController');

Route::get('vehicles/confirm_deletion/{vehicle}', 'VehicleController@confirm_deletion')->name('vehicles.confirm_deletion');
Route::get('vehicles/mark_as_sold/{vehicle}', 'VehicleController@mark_as_sold')->name('vehicles.mark_as_sold');
Route::get('vehicles/mark_as_unsold/{vehicle}', 'VehicleController@mark_as_unsold')->name('vehicles.mark_as_unsold');
Route::resource('vehicles', 'VehicleController');

