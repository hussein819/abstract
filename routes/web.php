<?php

use App\Http\Controllers\AdvertisesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WebsiteController;
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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//**contact routs**//
//**abstract pages**//
Route::get('/', [AdvertisesController::class, 'index'])->name('advertise.home');
Route::get('/category', [AdvertisesController::class, 'category'])->name('advertise.category');
Route::get('/about', [AdvertisesController::class, 'about'])->name('advertise.about');
Route::get('/single-audio-{advertise}', [AdvertisesController::class, 'audio'])->name('advertise.audio')->middleware('auth');
Route::get('/single-video-{advertise}', [AdvertisesController::class, 'video'])->name('advertise.video')->middleware('auth');
Route::get('/single-gallery', [AdvertisesController::class, 'gallery'])->name('advertise.gallery')->middleware('auth');
Route::get('/contact', [AdvertisesController::class, 'contact'])->name('contact.create')->middleware('auth');
Route::get('/single-standard-{advertise}', [AdvertisesController::class, 'standard'])->name('advertise.standard')->middleware('auth');
Route::post('/single-store', [AdvertisesController::class, 'contact_store'])->name('advertise.store')->middleware('auth');
Route::delete('/single-{contact}', [AdvertisesController::class, 'contact_destroy'])->name('advertise.destroy')->middleware('auth');
Route::get('/single-{contact}-edit', [AdvertisesController::class, 'contact_edit'])->name('advertise.edit')->middleware('auth');
Route::patch('/single-{contact}', [AdvertisesController::class, 'contact_update'])->name('advertise.update')->middleware('auth');
Route::get('/style-guide', [AdvertisesController::class, 'guide'])->name('advertise.guide');
Route::any('/search', [AdvertisesController::class, 'search'])->name('advertise.search');

//*control panel*//
Route::get('/control/add', [AdvertisesController::class, 'create'])->name('control.add')->middleware('auth');
Route::post('/control/store', [AdvertisesController::class, 'store'])->name('control.store')->middleware('auth');
Route::get('/control/show', [AdvertisesController::class, 'show'])->name('control.show')->middleware('auth');
Route::get('/control/{advertise}/details', [AdvertisesController::class, 'details'])->name('control.details')->middleware('auth');
Route::get('/control/{advertise}/edit', [AdvertisesController::class, 'edit'])->name('control.edit')->middleware('auth');
Route::patch('/control/{advertise}', [AdvertisesController::class, 'update'])->name('control.update')->middleware('auth');
Route::delete('/control/{advertise}', [AdvertisesController::class, 'destroy'])->name('control.destroy')->middleware('auth');

//*website routes*//
Route::get('/website/add', [WebsiteController::class, 'create'])->name('website.add')->middleware('auth');
Route::get('/website/show', [WebsiteController::class, 'index'])->name('website.show')->middleware('auth');
Route::get('/website/{website}/edit', [WebsiteController::class, 'edit'])->name('website.edit')->middleware('auth');
Route::post('/website/store', [WebsiteController::class, 'store'])->name('website.store')->middleware('auth');
Route::patch('/website/{website}', [WebsiteController::class, 'update'])->name('website.update')->middleware('auth');
Route::delete('/website/{website}', [WebsiteController::class, 'destroy'])->name('website.destroy')->middleware('auth');

//*users routs*//
Route::get('/users/show', [AdvertisesController::class, 'user_show'])->name('users.show')->middleware('auth');
