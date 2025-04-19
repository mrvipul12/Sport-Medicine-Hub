<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/adminlogin', 'adminlogin')->name('adminlogin');
    Route::post('/adminloginsubmit', 'adminloginsubmit')->name('adminloginsubmit');
});
