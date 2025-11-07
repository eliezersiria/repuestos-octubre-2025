<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RepuestoController;

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria')->middleware('auth');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categoria.crear')->middleware('auth');
Route::get('/categorias/show',   [CategoriaController::class, 'show'])->name('categoria.show')->middleware('auth');
Route::get('/categorias/trash',  [CategoriaController::class, 'trash'])->name('categoria.trash')->middleware('auth');

Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores')->middleware('auth');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.crear')->middleware('auth');
Route::get('/proveedores/show', [ProveedorController::class, 'show'])->name('proveedores.show')->middleware('auth');
Route::get('/proveedores/trash',  [ProveedorController::class, 'trash'])->name('proveedores.trash')->middleware('auth');

Route::get('/repuestos', [RepuestoController::class, 'index'])->name('repuestos')->middleware('auth');
Route::get('/repuestos/create', [RepuestoController::class, 'create'])->name('repuestos.crear')->middleware('auth');
Route::get('/repuestos/show', [RepuestoController::class, 'show'])->name('repuestos.show')->middleware('auth');
Route::get('/repuestos/editar-repuesto/{id}', [RepuestoController::class, 'edit'])->name('repuesto.editar')->middleware('auth');