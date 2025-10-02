<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::post('email', [EmailController::class, 'insert']);
Route::get('/health', fn() => response()->json(['ok' => true]));
