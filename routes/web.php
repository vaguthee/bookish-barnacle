<?php

use Illuminate\Support\Facades\Route;

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
Auth::loginUsingId(1);

Route::group(['prefix' => 'api'], function() {
    Route::get('/discover', 'DashboardController@discover')->name('discover');
    Route::get('/search', 'DashboardController@search')->name('search');
    Route::get('/entities/{id}', 'EntityController@show')->name('entitites.show');
    Route::get('/entities/{id}/addtotrip', 'EntityController@addToTrip')->name('addToTrip');
    Route::get('/trips/{id}', 'TripController@show')->name('trips.show');
    Route::get('/trips', 'TripController@index')->name('trips.index');
});

Route::get('/logout', 'LogoutController@logout')->name('getLogout');

Route::group(['prefix' => '/admin/'], function() {
    return 'admin home';
});

Route::group(['prefix' => '/partner/'], function() {
    return 'partner home';
});

Route::get('{any}', function () {
    return view('spa', [
            'spaVariables' => [
                'path' => config('app.spa.path'),
                'google_analytics_id' => config('app.spa.google_analytics_id')
            ]
        ]);
})->where('any', '.*');

Route::get('/', 'GuestController@home')->name('publicHome');


Route::post('/pics/upload', 'ImageController@upload')->name('pics.upload');
// Route::get('/', function () { return view('welcome'); });



