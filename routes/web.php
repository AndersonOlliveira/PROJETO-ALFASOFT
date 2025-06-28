<?php

use App\Http\Controllers\ContatController;
use App\Http\Controllers\ListController;
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
 Route::get('/', [ListController::class, 'index'])->name('main.index');

 Route::get('/Create-Contact', [ContatController::class, 'created'])->name('main.create');
 Route::post('/Store-Contact', [ContatController::class, 'store'])->name('main.store');
 Route::get('/Preview-Contact/{dados}', [ContatController::class, 'preview'])->name('main.preview');
 Route::get('/Edit-Contact/{dados}', [ContatController::class, 'editar'])->name('main.edit');
 Route::put('/Update-Contact/{dados}', [ContatController::class, 'update'])->name('main.update');

 Route::delete('/Delete-Contact/{dados}', [ContatController::class, 'destroy'])->name('main.delete');

 Route::put('/Ative-Contact/{id}', [ContatController::class, 'ative'])->name('main.ativeContact');


