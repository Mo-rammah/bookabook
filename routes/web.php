<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
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
//show the main page
Route::get('/', function () {
    return view('books.index');
});

//books related routes

//show the book list page
Route::get('/list', [BookController::class, 'index']);

//show the create book listing forum
Route::get('/books/create', [BookController::class, 'create']);

//store the new book listing
Route::post('/listing', [BookController::class, 'store']);

//delete listing
Route::delete('/books/{book}', [BookController::class, 'destroy']);

//show edit form
Route::get('/books/{book}/edit', [BookController::class, 'edit']);

//update listing
Route::put('/books/{book}', [BookController::class, 'update']);

//show the genres list page
Route::get('/genres', [BookController::class, 'genres']);

//favorite
Route::post('/books/{book}/favorite', [BookController::class, 'favorite'])->middleware('auth');



//files related routes

//show all posts
Route::get('/posts', [PostController::class, 'index']);



//User related routes

//show register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users', [UserController::class, 'store']);

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


//upvote
Route::post('/books/{book}/upvote', [VoteController::class, 'upvote'])->middleware('auth');

//downvote
Route::post('/books/{book}/downvote', [VoteController::class, 'downvote'])->middleware('auth');




//show a single book
Route::get('/books/{book}', [BookController::class, 'show']);
