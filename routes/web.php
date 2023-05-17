<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/',  [MainController::class,'index'])->name('main.index');
Route::post('/convertDocPdf',  [MainController::class,'convertDocPdf'])->name('main.convertDocPdf');
