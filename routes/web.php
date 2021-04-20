<?php

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


Auth::routes();

Route::get('/tasks/{id}', [App\Http\Controllers\HomeController::class, 'views'])->name('tasks');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
	Route::get('/tasks', [App\Http\Controllers\Admin\TasksController::class, 'index'])->name('admin.tasks');
	
	Route::get('/admin/tasks/{id}', [App\Http\Controllers\Admin\TasksViewsController::class, 'views'])->name('admin.tasks.view.edit');
	
	Route::post('/tasks', [App\Http\Controllers\Admin\TasksController::class, 'edit'])->name('admin.tasks.edit');
	
	Route::get('/tasks/create', [App\Http\Controllers\Admin\TasksController::class, 'createindex'])->name('
		admin.tasks.create.view');
	
	Route::post('/tasks/create', [App\Http\Controllers\Admin\TasksController::class, 'create'])->name('admin.tasks.create');
});