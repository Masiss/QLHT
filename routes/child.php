<?php

use App\Http\Controllers\Child\AssignmentController;
use App\Http\Controllers\Child\PointController;
use App\Http\Controllers\Child\ScheduleController;
use App\Http\Controllers\ChildController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChildController::class, 'index'])->name('index');
Route::resource('assignment', AssignmentController::class)->except([
    'create',
    'store',
    'edit',
    'destroy'
]);
Route::resource('point', PointController::class)->except([
    'show',
    'destroy'
]);
Route::resource('schedule', ScheduleController::class)->except([
    'show',
    'destroy'
]);
