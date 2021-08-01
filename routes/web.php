<?php

use App\Http\Controllers\ExtraDocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiembrosController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\InstrumentoController;

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
    Route::get('getCantonJson',[ResidentController::class, 'getCantonJson'])->name('getCantonJson');
    Route::get('/getResidentsCompressed', [ResidentController::class, 'getResidentsCompressed']);
});

Route::prefix('members')->group(function () {
    Route::get('/',[MiembrosController::class, 'index'])->name('miembros.index');
    Route::get('/create', [MiembrosController::class, 'create'])->name('miembros.create');
    Route::get('/edit/{id}', [MiembrosController::class, 'edit'])->name('miembros.edit');
    Route::get('/show/{id}', [MiembrosController::class, 'show'])->name('miembros.shpw');
    Route::put('/update/{id}', [MiembrosController::class, 'update'])->name('miembros.update');
    Route::post('/add-member', [MiembrosController::class, 'store'])->name('miembros.store');
    Route::get('/getData', [MiembrosController::class, 'getData'])->name('miembros.get');
    Route::delete('/destroy/{id}', [MiembrosController::class, 'destroy'])->name('miembros.destroy');
    Route::delete('/destroySeveralRecords/{ids}', [MiembrosController::class, 'destroySeveralRecords'])->name('miembros.destroySeveralRecords');

});

Route::prefix('instruments')->group(function () {
    Route::get('/aplicar',[InstrumentoController::class, 'aplicar'])->name('intrumento.aplicar');
    Route::get('/gestionar', [InstrumentoController::class, 'gestionar'])->name('intrumento.gestionar');
    Route::get('/editar/{id}', [InstrumentoController::class, 'edit'])->name('intrumento.edit');
    Route::get('/llenar/{id}', [InstrumentoController::class, 'llenar'])->name('intrumento.llenar');
    Route::get('/ver/{id}/{type}', [InstrumentoController::class, 'ver'])->name('intrumento.ver');
    Route::get('/create', [InstrumentoController::class, 'create'])->name('intrumento.crear');
    Route::post('/store', [InstrumentoController::class, 'store'])->name('intrumento.store');
    Route::post('/aplicar-resident-get', [InstrumentoController::class, 'aplicaWithResidentData'])->name('intrumento.aplicar.data.resident');
    Route::post('/aplicar-resident-instrument-status', [InstrumentoController::class, 'aplicaInstrumentStatusResident'])->name('intrumento.aplicar.status.resident');
    Route::post('/resident-instrument-status', [InstrumentoController::class, 'instrumentStatusResident'])->name('intrumento.status.data.resident');
    Route::post('/update/{id}', [InstrumentoController::class, 'update'])->name('intrumento.update');
    Route::post('/llenar-update/{id}', [InstrumentoController::class, 'llenarUpdate'])->name('intrumento.update.llenar');
    Route::post('/aplicar-resident', [InstrumentoController::class, 'aplicarResident'])->name('intrumento.aplicar.resident');
    Route::get('/all', [InstrumentoController::class, 'all'])->name('intrumento.all');
    Route::get('/my', [InstrumentoController::class, 'gestionarMy'])->name('intrumento.my');
    Route::delete('/destroy/{id}', [InstrumentoController::class, 'destroy'])->name('InstrumentoController.destroy');

});

Route::prefix('reports')->group(function () {
    Route::get('/monthly', [ExtraDocumentController::class, 'monthly'])->name('report.monthly');
    Route::post('/monthly-generate', [ExtraDocumentController::class, 'monthlyGenerate'])->name('report.monthly.generate');
    Route::get('/internal', [ExtraDocumentController::class, 'internal'])->name('report.internal');
    Route::post('/internal-generate', [ExtraDocumentController::class, 'internalGenerate'])->name('report.internal.generate');

});

Route::get('/getResidentJson/{query}',[InstrumentoController::class, 'getResidentJson'])->name('getResidentJson');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    return redirect()->route('login');
});