<?php

use App\Http\Controllers\ImageCaptureController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.form');
});

Route::get('/page', [PageController::class, 'showForm'])->name('page.form');
Route::post('/page', [PageController::class, 'calculate'])->name('page.calculate');
Route::post('/capture-image', [ImageCaptureController::class, 'captureHtml'])->name('capture.image');
