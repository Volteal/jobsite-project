<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

// LISTING ROUTES
//All Listings
Route::get('/', [ListingController::class, 'index'])->name('home');

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth')->name('create.listing');

//Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth')->name('store');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth')->name('manage.listing');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth')->name('edit.listing');

//Edit Submit to Update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth')->name('edit.update');

//Submit to delete
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth')->name('edit.delete');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('show');

//USER ROUTES
//Show Register Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('user.create');

//Create New User
Route::post('/users', [UserController::class, 'store'])->name('user.store');

//Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('user.logout');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('user.login');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate');
