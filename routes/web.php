<?php

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

Route::get('/', function () {
    return view('welcome');
});


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
        Route::prefix('alojamientos')->name('alojamientos/')->group(static function() {
            Route::get('/',                                             'AlojamientosController@index')->name('index');
            Route::get('/create',                                       'AlojamientosController@create')->name('create');
            Route::post('/',                                            'AlojamientosController@store')->name('store');
            Route::get('/{alojamiento}/edit',                           'AlojamientosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AlojamientosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{alojamiento}',                               'AlojamientosController@update')->name('update');
            Route::delete('/{alojamiento}',                             'AlojamientosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('gastronomia')->name('gastronomia/')->group(static function() {
            Route::get('/',                                             'GastronomiaController@index')->name('index');
            Route::get('/create',                                       'GastronomiaController@create')->name('create');
            Route::post('/',                                            'GastronomiaController@store')->name('store');
            Route::get('/{gastronomium}/edit',                          'GastronomiaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'GastronomiaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{gastronomium}',                              'GastronomiaController@update')->name('update');
            Route::delete('/{gastronomium}',                            'GastronomiaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('gatronomia')->name('gatronomia/')->group(static function() {
            Route::get('/',                                             'GatronomiaController@index')->name('index');
            Route::get('/create',                                       'GatronomiaController@create')->name('create');
            Route::post('/',                                            'GatronomiaController@store')->name('store');
            Route::get('/{gatronomium}/edit',                           'GatronomiaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'GatronomiaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{gatronomium}',                               'GatronomiaController@update')->name('update');
            Route::delete('/{gatronomium}',                             'GatronomiaController@destroy')->name('destroy');
        });
    });
});