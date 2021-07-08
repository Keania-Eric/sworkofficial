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
Route::get('/blog/tag/{tag}', [BlogController::class, 'indexByTag'])->name('blog.index.tag');
Route::get('/blog/category/{id}', [BlogController::class, 'indexByCategory'])->name('blog.index.category');
Route::post('/blog/search', [BlogController::class, 'indexBySearch'])->name('blog.index.search');
Route::get('/blog/{slug}', [BlogController::class, 'single'])->name('blog.single');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostsController@index')->name('index');
            Route::get('/create',                                       'PostsController@create')->name('create');
            Route::post('/',                                            'PostsController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostsController@update')->name('update');
            Route::delete('/{post}',                                    'PostsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('post-categories')->name('post-categories/')->group(static function() {
            Route::get('/',                                             'PostCategoriesController@index')->name('index');
            Route::get('/create',                                       'PostCategoriesController@create')->name('create');
            Route::post('/',                                            'PostCategoriesController@store')->name('store');
            Route::get('/{postCategory}/edit',                          'PostCategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostCategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{postCategory}',                              'PostCategoriesController@update')->name('update');
            Route::delete('/{postCategory}',                            'PostCategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tagging-tags')->name('tagging-tags/')->group(static function() {
            Route::get('/',                                             'TaggingTagsController@index')->name('index');
            Route::get('/create',                                       'TaggingTagsController@create')->name('create');
            Route::post('/',                                            'TaggingTagsController@store')->name('store');
            Route::get('/{taggingTag}/edit',                            'TaggingTagsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TaggingTagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{taggingTag}',                                'TaggingTagsController@update')->name('update');
            Route::delete('/{taggingTag}',                              'TaggingTagsController@destroy')->name('destroy');
        });
    });
});