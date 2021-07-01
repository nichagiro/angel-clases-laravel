<?php

use App\Http\Controllers\PeoplesController;
use App\Http\Controllers\phonesController;
use App\Http\Controllers\sendEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('telefonos', phonesController::class);
Route::resource('personas', PeoplesController::class);

Route::get('send-email',[sendEmailController::class, 'envio'])->name('envio-correo');
