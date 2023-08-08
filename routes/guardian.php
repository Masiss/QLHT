<?php

use App\Http\Controllers\Guardian\AssignmentController;
use App\Http\Controllers\Guardian\ChildController;
use App\Http\Controllers\GuardianController;
use Illuminate\Support\Facades\Route;

Route::get('/',[GuardianController::class,'index'])->name('index');
Route::resource('assignment', AssignmentController::class)->except([
    'show',
    'destroy',
]);
Route::resource('child', ChildController::class)->except([
    'edit',
    'update',
    'destroy',
]);
