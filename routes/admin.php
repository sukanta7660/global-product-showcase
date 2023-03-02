<?php
/* Namespaces */

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


/*-------- Admin Routes -----------------*/

Route::get('', [DashboardController::class, 'index'])->name('dashboard');
