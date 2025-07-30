<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {  //login ၀◌င်ပြီးstages
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Route::middleware('admin')->group(function(){
    //     Route::get('admin/dashboard',function () {
    //             return view('adminHomePage');
    //         })->name('adminHomePage');

    //         Route::get('adminProcess',function(){
    //             dd('admin acc is running');
    //         })->name('adminProcess');
    // });
    //or

    //  Route::group(['middleware'=>'admin'],function(){
    //     Route::get('admin/dashboard',function () {
    //             return view('adminHomePage');
    //         })->name('adminHomePage');

    //         Route::get('adminProcess',function(){
    //             dd('admin acc is running');
    //         })->name('adminProcess');
    // });
    //or

    Route::group(['middleware'=>'admin' , 'prefix' => 'admin'],function(){
        Route::get('dashboard',function () {
                return view('adminHomePage');
            })->name('adminHomePage');

            Route::get('adminProcess',function(){
                dd('admin acc is running');
            })->name('adminProcess');
    });

    // Route::get('user/dashboard',function () {
    //     return view('userHomePage');
    // })->name('userHomePage')->middleware('user');

    // Route::get('userProcess',function(){
    //     dd('user acc is running');
    // })->name('userProcess')->middleware('user');
    //or

     Route::group(['middleware'=>'user' , 'prefix' => 'user'],function(){
        Route::get('dashboard',function () {
                return view('userHomePage');
            })->name('userHomePage');

            Route::get('userProcess',function(){
                dd('user acc is running');
            })->name('userProcess');
    });


});


require __DIR__.'/auth.php';
