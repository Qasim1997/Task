<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', [EmployeeController::class, 'showFiles'])->name('show.index');
Route::get('/file/{id}/perpage={perpage}', [EmployeeController::class, 'showFileData'])->name('file.index');
Route::post('/', [EmployeeController::class, 'uploadData'])->name('user.post');
Route::delete('/{id}', [EmployeeController::class, 'deleteData'])->name('user.delete');




