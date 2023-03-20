<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/clear', function(){
    \Artisan::call('optimize');
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('config:clear');
    return 'cleared';
});

Route::get('/migrate', function(){
    \Artisan::call('migrate:fresh --seed');
    return 'database migrated';
});

Route::get('/update-app', function()
{
    \Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
