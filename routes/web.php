<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;

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

Route::get('/', function () {
    if (auth()->user()) {
         return redirect(route('home'));
    } else {
        return redirect(route('login'));
    }
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
  'prefix' => 'users',
  'as' => 'users.',
  'middleware' => ['auth:web','can:isAdmin']
], function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('store');
    Route::post('/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
});

Route::group([
  'prefix' => 'courses',
  'as' => 'courses.',
  'middleware' => ['auth:web']
], function () {
    Route::get('/', [App\Http\Controllers\CourseController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\CourseController::class, 'create'])->middleware(['can:manageCourse'])->name('create');
    Route::get('/{id}/edit', [App\Http\Controllers\CourseController::class, 'edit'])->middleware(['can:manageCourse'])->name('edit');
    Route::post('/store', [App\Http\Controllers\CourseController::class, 'store'])->middleware(['can:manageCourse'])->name('store');
    Route::post('/{id}/update', [App\Http\Controllers\CourseController::class, 'update'])->middleware(['can:manageCourse'])->name('update');
    Route::delete('/{id}/destroy', [App\Http\Controllers\CourseController::class, 'destroy'])->middleware(['can:manageCourse'])->name('destroy');
});

Route::group([
  'prefix' => 'enroll',
  'as' => 'enroll.',
], function () {
    Route::get('/', [App\Http\Controllers\EnrollController::class, 'index'])->name('index');
    Route::get('/{id}/store', [App\Http\Controllers\EnrollController::class, 'store'])->name('store');
});
