<?php

use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TblController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/chk',[HomeController::class,'chk'])->name('chk');
Route::get('/ch',[HomeController::class,'show'])->name('show');
Route::get('/delete/{id}',[HomeController::class,'destroy'])->name('deletecustomer');
Route::get('/edit/{id}',[HomeController::class,'edit'])->name('editcustomer');
Route::post('/edit/{id}',[HomeController::class,'update']);

//Chefs:

Route::get('/form',[ChefController::class,'index'])->name('form');
Route::post('/form',[ChefController::class,'store']);
Route::get('/chefsdashboard',[ChefController::class,'show'])->name('chef_dashboard');
Route::get('/deletechef/{id}',[ChefController::class,'destroy'])->name('deletechef');
Route::get('/editchef/{id}',[ChefController::class,'edit'])->name('editchef');
Route::post('/editchef/{id}',[ChefController::class,'update']);



//Foods:


Route::get('/foodform',[FoodController::class,'index'])->name('foodform');
Route::post('/foodform',[FoodController::class,'store']);
Route::get('/foodsdashboard',[FoodController::class,'show'])->name('fooddashboard');
Route::get('/deletefood/{id}',[FoodController::class,'destroy'])->name('deletefood');
Route::get('/editfood/{id}',[FoodController::class,'edit'])->name('editfood');
Route::post('/editfood/{id}',[FoodController::class,'update']);



//Reservations:
Route::any('/TblForm',[TblController::class,'store'])->name('tblform');
Route::get('/tbldashboard',[TblController::class,'show'])->name('tbldash');
Route::get('/deletedata/{id}',[TblController::class,'destroy'])->name('deletedata');
Route::get('/editdata/{id}',[TblController::class,'edit'])->name('editdata');
Route::post('/editdata/{id}',[TblController::class,'update']);



// options:

Route::get('/option',[OptionController::class,'index'])->name('option');





















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
