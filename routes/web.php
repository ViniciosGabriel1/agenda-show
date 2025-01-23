<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function(){

    Route::get('/', function () {
        return view('home');
    });


    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
    
});