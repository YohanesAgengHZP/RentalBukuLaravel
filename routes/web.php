<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
})->middleware('auth');

Route::middleware('only_guest')->group(function(){
    
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);

});

Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['only_admin']);
    
    Route::get('profile', [UserController::class, 'profile'])->middleware(['only_client']);
    
    Route::get('books', [BookController::class, 'index']);
    Route::get('books-add', [BookController::class, 'addBooks']);
    Route::post('books-add', [BookController::class, 'createBooks']);
    Route::get('book-edit/{slug}', [BookController::class, 'editBooks']);
    Route::post('book-edit/{slug}', [BookController::class, 'updateBooks']);
    Route::get('book-delete/{slug}', [BookController::class, 'deleteBooks']);
    Route::get('book-destroy/{slug}', [BookController::class, 'destroyBooks']);
    Route::get('book-deleted', [BookController::class, 'deletedBooks']);
    Route::get('book-restore/{slug}', [BookController::class, 'restoreBooks']);
    Route::get('book-restore/{slug}', [BookController::class, 'restoreBooks']);
    

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'add']);
    Route::post('category-add', [CategoryController::class, 'addProcess']);
    Route::get('category-edit/{slug}', [CategoryController::class, 'editProcess']);
    Route::put('category-edit/{slug}', [CategoryController::class, 'updateProcess']);
    Route::get('category-delete/{slug}', [CategoryController::class, 'deleteProcess']);
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroyProcess']);
    Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
    Route::get('category-restore/{slug}', [CategoryController::class, 'restoreCategory']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('registered-users', [UserController::class, 'register']);
    Route::get('users-detail/{slug}', [UserController::class, 'detail']);
    Route::get('users-approve/{slug}', [UserController::class, 'approve']);
    Route::get('users-banned/{slug}', [UserController::class, 'delete']);
    Route::get('users-destroy/{slug}', [UserController::class, 'destroy']);
    Route::get('users-deleted', [UserController::class, 'deleted']);
    Route::get('users-restore/{slug}', [UserController::class, 'restore']);


    Route::get('rent-logs', [RentLogController::class, 'index']);
});


