<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PictureController;


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

Route::get('/', [PictureController::class, 'index']);

Route::resources([
    'pictures' => PictureController::class,
]);

Route::post('/pictures/{picture}/upvote', [PictureController::class, 'upvote'])->name('pictures.upvote');

// post picture to database and local storage 
Route::post('/pictures/store', [PictureController::class, 'store']);