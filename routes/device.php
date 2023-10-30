<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;

Route::get('/device', [DeviceController::class, 'index'])->name('device')->middleware('auth');
Route::get('/device/add-type', [DeviceController::class, 'create'])->name('device.add')->middleware('auth');
Route::post('/device/add-device', [DeviceController::class, 'create'])->name('device.add')->middleware('auth');
Route::post('/device/add', [DeviceController::class, 'store'])->name('device.add')->middleware('auth');
Route::get('/device/{slug}', [DeviceController::class, 'show'])->name('device.show')->middleware('auth');
Route::patch('/device/{slug}', [DeviceController::class, 'update'])->name('device.update')->middleware('auth');
Route::delete('device/{slug}', [DeviceController::class, 'destroy'])->name('device.destroy')->middleware('auth');
Route::post('/device/on', [DeviceController::class, 'turnOnDevice'])->name('device.on')->middleware('auth');
Route::post('/device/off', [DeviceController::class, 'turnOffDevice'])->name('device.off')->middleware('auth');