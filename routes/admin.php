<?php
/* Namespaces */

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ShopController;
use Illuminate\Support\Facades\Route;


/*-------- Admin Routes -----------------*/

Route::get('', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('shops', ShopController::class)
    ->except(['create', 'edit', 'show'])
;
Route::resource('locations', LocationController::class)
    ->except(['create', 'edit', 'show'])
;
