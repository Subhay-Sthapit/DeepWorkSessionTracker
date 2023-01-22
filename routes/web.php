<?php

use App\Http\Controllers\DeepWorkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get','post'],'/create_Deep_work_session',[DeepWorkController::class,'createDeepSession'])->name('create.DeepWorkSession');
Route::get('/view_Deep_work_sessions',[DeepWorkController::class,'viewDeepWorkSessions'])->name('view.DeepWorkSession');
