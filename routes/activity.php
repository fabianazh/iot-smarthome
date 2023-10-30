<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/activity', [ActivityController::class, 'index'])->name('activity')->middleware('auth');
