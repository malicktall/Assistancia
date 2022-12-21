<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemandeController;
use App\Models\Demande;
use GuzzleHttp\Psr7\Request;

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
})->name('welcome');


Auth::routes();

Route::resource('demande',DemandeController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admine', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin')->middleware('admin');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'superadmin'])->name('superadmin')->middleware('admin');

Route::get('template', function(){
    return view('template');
});

Route::resource('user',UserController::class);

Route::get('/admin/assigner/{demande}', [DemandeController::class, 'assigner'])->name('demande.assigner')->middleware('admin');
Route::get('/admin/traitement/{demande}', [DemandeController::class, 'traitement'])->name('demande.traitement')->middleware('admin');
Route::get('/admin/listedemande/{statut}', [DemandeController::class, 'listedemande'])->name('demande.listedemande')->middleware('admin');
Route::get('/admin/operation/{demande}/{operation}', [DemandeController::class, 'operation'])->name('demande.operation')->middleware('admin');
Route::get('/admin/alldemande', [DemandeController::class, 'alldemandes'])->name('demande.all')->middleware('admin');



Route::get('/admin/info/{demande}', function(){
    return view('demande.info');
})->name('demande.info')->middleware('admin');

Route::get('/admin/profile/{user}', [UserController::class, 'profile'])->name('user.profile')->middleware('admin');
Route::get('/admin/update/{user}', [UserController::class, 'a_update'])->name('admin.update')->middleware('admin');
Route::get('/admin/alluser', [UserController::class, 'allusers'])->name('user.allusers')->middleware('admin');
Route::get('/admin/alladmin', [UserController::class, 'alladmins'])->name('user.alladmins')->middleware('admin');











