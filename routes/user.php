<?php

use App\Http\Controllers\User\FavouritesController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\SpecialDiscountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/special-discount/products', [SpecialDiscountController::class, 'index'])
    ->name('special-discount.product');

Route::get('/my-favourite/products', [FavouritesController::class, 'index'])
    ->name('my-favourite.product');

Route::patch('/add-to-favourite/{product}', [FavouritesController::class, 'addToFavourite'])
    ->name('add-to.my-favourite');

Route::delete('/remove-from-favourites/{favouriteProduct}', [FavouritesController::class, 'removeFromFavourite'])
    ->name('remove-from.my-favourite');
