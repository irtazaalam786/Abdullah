<?php

use Illuminate\Support\Facades\Route;
use App\Models\Agency;
use App\Models\Profession;
use App\Models\AgencyProfession;

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

Route::get('/agency/create', function () {
	$agency = new Agency();
	$agency->name='Test';
	$agency->save();
	dd('Save');
});

Route::get('/profession/create', function () {
	$profession = new Profession();
	$profession->name='Test';
	$profession->price=50;
	$profession->save();
	dd('Save');
});

Route::get('/agency/profession/create', function () {
	$agency_profession = new AgencyProfession();
	$agency_profession->agency_id=1;
	$agency_profession->profession_id=1;
	$agency_profession->save();
	dd('Save');
});


