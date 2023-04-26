<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('find', 'SearchController@find');

Route::prefix('api')->group(

    function(){
        Route::get('car/', [CarController::class, 'index'])->name('api.cars.index');
        Route::get('car/create', [CarController::class, 'create'])->name('api.cars.create');
        Route::post('car', [CarController::class, 'store'])->name('api.cars.store');
        Route::get('car/{car}', [CarController::class, 'show'])->name('api.cars.show');
        Route::get('car/{car}/edit', [CarController::class, 'edit'])->name('api.cars.edit');
        Route::put('car/{car}', [CarController::class, 'update'])->name('api.cars.update');
        Route::delete('car/{car}', [CarController::class, 'destroy'])->name('api.cars.destroy');

    }
);
