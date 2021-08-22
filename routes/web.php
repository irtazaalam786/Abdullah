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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function(){
    Route::get('/agency/create','AgencyController@agency')->name('agency.create');
    Route::post('/agency/store','AgencyController@agency_store')->name('agency.store');
    Route::get('/profession/create','AgencyController@profession')->name('profession.create');
    Route::post('/profession/store','AgencyController@profession_store')->name('profession.store');
    Route::get('/profession/agency/create','AgencyController@agency_profession')->name('agency.profession.create');
    Route::post('/agency/profession/store','AgencyController@agency_profession_store')->name('agency.profession.store');
});

Route::get('/agency/profession/create', function () {
	$agency_profession = new AgencyProfession();
	$agency_profession->agency_id=1;
	$agency_profession->profession_id=1;
	$agency_profession->save();
	dd('Save');
});


