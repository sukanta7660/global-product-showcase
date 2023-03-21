<?php

use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\SpecialDiscountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/special-discount/products', [SpecialDiscountController::class, 'index'])
    ->name('special-discount.product');
