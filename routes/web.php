<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VcardController;

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
Route::get('/qr/to/all',[ VcardController::class , 'QrToAll']);
Route::resources([
    'vcard' => VcardController::class,
]);

// Route::get('/page', function () {
//     return view('page');
// });

// Route::get('/',[HomeController::class , 'index'])->name('home');
Route::get('/',[VcardController::class , 'index'])->name('profile');
Route::get('/image/{id}/delete',[VcardController::class , 'deleteimage']);



Route::get('/admin',[AdminController::class , 'index'])->name('dashboard');
Route::get('/admin/vcard',[AdminController::class , 'vcard'])->name('admin.vcard');
Route::get('/admin/clear',[AdminController::class , 'clear'])->name('clear');
Route::get('/user/{id}/activate',[AdminController::class , 'activate']);
Route::get('/user/{id}/deactivate',[AdminController::class , 'deactivate']);
Route::get('/user/change/{color}/{text}',[AdminController::class , 'changeTheme'])->name('user.changeTheme');
Route::post('/user/{id}/limit',[AdminController::class , 'limit']);

Route::get('download/{link}', [VcardController::class, 'download'])->name('download');

Auth::routes();
