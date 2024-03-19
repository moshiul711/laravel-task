<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TagController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/',[TaskController::class,'index'])->name('dashboard');
    Route::post('/task-store',[TaskController::class,'storeTask'])->name('task.store');
    Route::post('/tag-store',[TagController::class,'storeTag'])->name('tag.store');

    Route::get('/task-view',[TaskController::class,'taskView'])->name('task.view');
    Route::get('/task-edit/{id}',[TaskController::class,'taskEdit'])->name('task.edit');
    Route::post('/task-update/{id}',[TaskController::class,'taskUpdate'])->name('task.update');
    Route::get('/task-delete/{id}',[TaskController::class,'taskDelete'])->name('task.delete');

    Route::post('/task-filter',[TaskController::class,'taskFilter'])->name('task.filter');
});
