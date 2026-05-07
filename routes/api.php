<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Các route công khai (Public)
Route::post('/page-api', [PageController::class, 'calculateApi']);
