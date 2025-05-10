<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\gatePassController;
use App\Http\Controllers\regKendaraanController;

Route::get('/', function () {
    return view('/home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/process/{dataQr}', [gatePassController::class, 'processScan']);
Route::get('/home/successScan/{dataQr}', [gatePassController::class, 'successScan']);
Route::get('/home/logScan', [gatePassController::class, 'logScan']);

Route::get('/regKendaraan', [regKendaraanController::class, 'regKendaraan'])->name('regKendaraan');
Route::get('/regKendaraan/getNumberQr/{kode}', [regKendaraanController::class, 'getNumberQr']);
Route::post('/regKendaraan/posRegKendaraan', [regKendaraanController::class, 'posRegKendaraan']);

Route::get('/listKendaraan', [regKendaraanController::class, 'listKendaraan'])->name('listKendaraan');
Route::get('/listKendaraan/view/{dataID}', [regKendaraanController::class, 'view']);
Route::get('/listKendaraan/edit/{dataID}', [regKendaraanController::class, 'edit']);

Route::middleware('auth')->group(function (){
    Route::get('/dataKendaraan', [HomeController::class, 'index'])->name('dataKendaraan');    
});
Auth::routes();