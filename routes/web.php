<?php

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

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Author\AuthorDashController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


define('PAGINATION_COUNT',5);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'admin.' ,'prefix' => 'admin','namespace' => 'Admin','middleware' => ['auth','admin']],
    function (){
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::get('all-books',[DashboardController::class,'getBooks'])->name('book');
        Route::get('show-book/{book_id}',[DashboardController::class,'showBook'])->name('showbook');
        Route::get('add-book',[DashboardController::class,'addBook'])->name('addbook');
        Route::post('add-book',[DashboardController::class,'saveBook'])->name('savebook');
        Route::get('delete-book/{book_id}',[DashboardController::class,'deleteBook'])->name('deletebook');
        Route::get('edit-book/{book_id}',[DashboardController::class,'editBook'])->name('editbook');
        Route::post('update-book/{book_id}',[DashboardController::class,'updateBook'])->name('updatebook');
        Route::get('all-users',[DashboardController::class,'getUser'])->name('alluser');
    });

Route::group(['as' => 'author.' ,'prefix' => 'author','namespace' => 'Author','middleware' => ['auth','author']],
    function (){
        Route::get('dashboard',[AuthorDashController::class,'index'])->name('dashboard');
        Route::get('allBook',[AuthorDashController::class,'getBook'])->name('allbook');
        Route::get('borrow-book',[AuthorDashController::class,'getBorrow'])->name('borrowbook');
        Route::get('allBook/borrow/{book_id}',[AuthorDashController::class,'borrowBook'])->name('borrow');
        Route::get('borrow-book/{book_id}',[AuthorDashController::class,'deleteBorrowBook'])->name('delete-borrow');
    });
