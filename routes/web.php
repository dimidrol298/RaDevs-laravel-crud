<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;

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

Route::get('/', [StaterkitController::class, 'home'])->name('home');
Route::get('home', [StaterkitController::class, 'home'])->name('home');

Route::middleware("auth:sanctum")->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('tests', TestController::class);
    Route::get('manager-tests', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('manager-tests/{test}', [ManagerController::class, 'showTest'])->name('manager.show');
    Route::put('manager-tests/{test}', [ManagerController::class, 'setTestGrade'])->name('manager.setTestGrade');
});

