<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\WordController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');

Route::get('/words', [WordController::class, 'show'])->name('words');
Route::get('/sign/{literal}', [SignController::class, 'show'])->name('sign');
Route::get('/randomSign', [SignController::class, 'random'])->name('randomSign');
Route::get('/randomRequests/{num?}', [RequestController::class, 'randomRequests'])->name('randomRequests');
Route::get('/search/{word}', [WordController::class, 'search']);
Route::get('/create/{literal?}', [SignController::class, 'create'])->name('create');
Route::get('/report/{signId}', [SignController::class, 'showReport'])->name('report');

Route::post('/played', [ViewsController::class, 'increment']);
Route::post('/liked', [LikeController::class, 'toggleLike']);

Route::get('/index', [IndexController::class, 'show'])->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
