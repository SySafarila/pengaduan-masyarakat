<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Complaints
Route::get('/complaints', 'ComplaintsController@index')->name('complaints.index');
Route::get('/complaints/process', 'ComplaintsController@process')->middleware('isOfficerOrAdmin')->name('complaints.process');
Route::get('/complaints/complete', 'ComplaintsController@complete')->middleware('isOfficerOrAdmin')->name('complaints.complete');
Route::get('/complaints/{id}', 'ComplaintsController@show')->name('complaints.show');
Route::get('/my-complaints', 'ComplaintsController@myComplaints')->name('myComplaints');

Route::post('/complaints', 'ComplaintsController@store')->name('complaints.store');
Route::post('/complaints/{id}', 'ComplaintsController@update')->middleware('isOfficerOrAdmin')->name('complaints.update');
Route::patch('/complaints/{id}', 'ComplaintsController@setToComplete')->middleware('isOfficerOrAdmin')->name('complaints.setToComplete');
Route::post('/complaints/response/{id}', 'ComplaintsController@addResponse')->middleware('isOfficerOrAdmin')->name('complaints.addResponse');

Route::prefix('/files')->group(function () {
    Route::get('/photo/{fileName}', 'GetFiles@photo')->name('get.photo');
});

// Account

// Users
Route::get('/users', 'UsersController@index')->name('users.index');

// Gallery
