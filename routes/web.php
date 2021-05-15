<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;

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
    return view('home');
});

Route::prefix('residents')->group(function () {
    Route::get('/', [ResidentController::class, 'index'])->name('resident.index');
    Route::get('/create', [ResidentController::class, 'create'])->name('resident.create');
    Route::get('/edit/{id}', [ResidentController::class, 'edit'])->name('resident.edit');
    Route::get('/show/{id}', [ResidentController::class, 'show'])->name('resident.shpw');
    Route::put('/update/{id}', [ResidentController::class, 'update'])->name('resident.update');
    Route::post('/add-resident', [ResidentController::class, 'store'])->name('resident.store');
    Route::get('/getData', [ResidentController::class, 'getData'])->name('resident.get');
    Route::delete('/destroy/{id}', [ResidentController::class, 'destroy'])->name('resident.destroy');
    Route::delete('/destroySeveralRecords/{ids}', [ResidentController::class, 'destroySeveralRecords'])->name('resident.destroySeveralRecords');
    

    Route::get('/getResidentsCompressed', [ResidentController::class, 'getResidentsCompressed']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
