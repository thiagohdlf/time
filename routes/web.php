<?php

use App\Http\Controllers\Admin\{
    PermissionController,
    ProfileController,
    UserController,
};
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function(){

    //Permissions
    Route::get('/permissao', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permissao/criar', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permissao', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permissao/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('/permissao/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/permissao/{id}', [PermissionController::class, 'destroy'])->name('permission.delete');

    //Profile
    Route::get('/perfil', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/perfil/criar', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/perfil', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/perfil/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/perfil/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil/{id}', [ProfileController::class, 'destroy'])->name('profile.delete');

    //Profile x Permission
    Route::get('/perfil/{idProfile}/permissao', [ProfileController::class, 'permission'])->name('profile.permission');
    Route::post('/perfil/{idProfile}/permissao', [ProfileController::class, 'permissionAdd'])->name('profile.permission.add');
    Route::delete('/perfil/{id}/permissao/{idPermission}', [ProfileController::class, 'permissionRmv'])->name('profile.permission.rmv');

    //users
    Route::get('/usuario', [UserController::class, 'index'])->name('user.index');
    Route::get('/usuario/criar', [UserController::class, 'create'])->name('user.create');
    Route::post('/usuario', [UserController::class, 'store'])->name('user.store');
    Route::get('/usuario/{id}/editar', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/usuario/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/usuario/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('/usuario/{idUser}/perfil', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/usuario/{idUser}/perfil', [UserController::class, 'profileAdd'])->name('user.profile.add');
    Route::delete('/usuario/{idUser}/perfil/{idProfile}', [UserController::class, 'profileRmv'])->name('user.profile.rmv');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
