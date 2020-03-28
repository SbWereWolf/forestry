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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('wood-species')->name('wood-species/')->group(static function() {
            Route::get('/',                                             'WoodSpecieController@index')->name('index');
            Route::get('/create',                                       'WoodSpecieController@create')->name('create');
            Route::post('/',                                            'WoodSpecieController@store')->name('store');
            Route::get('/{woodSpecie}/edit',                            'WoodSpecieController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'WoodSpecieController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{woodSpecie}',                                'WoodSpecieController@update')->name('update');
            Route::delete('/{woodSpecie}',                              'WoodSpecieController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('bonitets')->name('bonitets/')->group(static function() {
            Route::get('/', 'BonitetController@index')->name('index');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('timber-classes')->name('timber-classes/')->group(static function() {
            Route::get('/', 'TimberClassController@index')->name('index');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('forest-resources')->name('forest-resources/')->group(static function() {
            Route::get('/',                                             'ForestResourcesController@index')->name('index');
            Route::get('/create',                                       'ForestResourcesController@create')->name('create');
            Route::post('/',                                            'ForestResourcesController@store')->name('store');
            Route::get('/{forestResource}/edit',                        'ForestResourcesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ForestResourcesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{forestResource}',                            'ForestResourcesController@update')->name('update');
            Route::delete('/{forestResource}',                          'ForestResourcesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('forestry-indicators')->name('forestry-indicators/')->group(static function() {
            Route::get('/',                                             'ForestryIndicatorController@index')->name('index');
            Route::get('/{forestryIndicator}/edit',                     'ForestryIndicatorController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ForestryIndicatorController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{forestryIndicator}',                         'ForestryIndicatorController@update')->name('update');
            Route::delete('/{forestryIndicator}',                       'ForestryIndicatorController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('cutting-areas')->name('cutting-areas/')->group(static function() {
            Route::get('/',                                             'CuttingAreaController@index')->name('index');
            Route::get('/{cuttingArea}/edit',                           'CuttingAreaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CuttingAreaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cuttingArea}',                               'CuttingAreaController@update')->name('update');
            Route::delete('/{cuttingArea}',                             'CuttingAreaController@destroy')->name('destroy');
        });
    });
});
