<?php
/* Namespaces */

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use Illuminate\Support\Facades\Route;


/*-------- Admin Routes -----------------*/

Route::get('', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('locations', LocationController::class);
