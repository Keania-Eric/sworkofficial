<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/api-docs', [SiteController::class, 'apiDocs'])->name('api-docs');

//Product Routes
Route::get('/tour', [SiteController::class, 'tour'])->name('product.tour');
Route::get('/pricing', [SiteController::class, 'pricing'])->name('product.pricing');
Route::get('/status', [SiteController::class, 'status'])->name('product.status');

//Solutions Route
Route::get('/project-management', [SiteController::class, 'projectManagement'])->name('solutions.project-management');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/single', [BlogController::class, 'single'])->name('blog.single');
