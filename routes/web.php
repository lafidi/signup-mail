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

Route::redirect('/', 'anmeldung');

Route::get('anmeldung', [App\Http\Controllers\AnmeldungsController::class, 'index'])->name('anmeldungsuebersicht');
Route::get('anmeldung/{veranstaltung}', [App\Http\Controllers\AnmeldungsController::class, 'anmeldung'])->name('anmeldung');
Route::post('anmeldung/{veranstaltung}', [App\Http\Controllers\AnmeldungsController::class, 'email'])->name('anmeldungsmail');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('benutzer', App\Http\Controllers\UserController::class);
    Route::resource('veranstaltung', App\Http\Controllers\VeranstaltungsController::class);
});
