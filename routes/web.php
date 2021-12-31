<?php

use App\Http\Controllers\Admin\SpecialityController;
use Illuminate\Support\Facades\Auth;
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
    return view('frontend.index');
});

Auth::routes(['register' => false]);
Auth::routes(['verify' => true]);

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //Speciality
    Route::resource('speciality', SpecialityController::class);
    
    Route::post('speciality/status', [SpecialityController::class, 'status'])->name('speciality.status');
    // Route::get('speciality/deleted-list', SpecialityController::class, 'deletedListIndex')->name('speciality.deleted_list');
    // Route::get('speciality/restore/{id}', SpecialityController::class, 'restore')->name('speciality.restore');
    // Route::delete('speciality/force-delete/{id}', SpecialityController::class, 'forceDelete')->name('speciality.force_destroy');
});

