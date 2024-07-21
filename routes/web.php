<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Role Routes
Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RolesController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RolesController::class, 'destroy'])->name('roles.destroy');

// Permission Routes
Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionsController::class, 'create'])->name('permissions.create');
Route::post('/permissions', [PermissionsController::class, 'store'])->name('permissions.store');
Route::get('/permissions/{permission}/edit', [PermissionsController::class, 'edit'])->name('permissions.edit');
Route::put('/permissions/{permission}', [PermissionsController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/{permission}', [PermissionsController::class, 'destroy'])->name('permissions.destroy');

// Role Permissions Routes
Route::get('/roles/{role}/permissions', [RolesController::class, 'permissions'])->name('roles.permissions');
Route::put('/roles/{role}/permissions', [RolesController::class, 'updatePermissions'])->name('roles.permissions.update');

// Route::resource('users', UsersController::class);
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/users/login',[UsersController::class,'loginView'])->name('users.loginView');
Route::post('/users/login',[UsersController::class,'loginUser'])->name('users.login');

Route::middleware('auth')->group(function(){
    Route::get('/admin',[AdminController::class,'dashboard'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
