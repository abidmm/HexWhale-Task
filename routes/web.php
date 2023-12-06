<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
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



// Login
Route::view('/', 'auth.login')->name('login');
Route::post('user-login', [AuthController::class, 'login'])->name('login.post');

//register
Route::view('/register', 'auth.register')->name('register');
Route::post('user-register', [AuthController::class, 'register'])->name('register.post');






Route::middleware('auth')->group(function () {
    //home
    Route::view('home', 'home')->name('home');

    //logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout.post');


    //view tasks
    Route::get('task/list',[TaskController::class,'list'])->name('task-list');
    // add task
    Route::view('task/create','task-create')->name('task-create');
    Route::post('task/add',[TaskController::class,'create'])->name('task.post');

    //view single task
    Route::get('task/single/{id}',[TaskController::class,'single'])->name('task.single');

    //update task
    Route::post('task/update/{id}',[TaskController::class,'update'])->name('task.update');

    //delete 
    Route::delete('task/delete/{id}',[TaskController::class,'delete'])->name('task.delete');



    //category
    Route::get('category/list',[CategoryController::class,'list'])->name('category-list');
    //get method for create and update category
    Route::get('category/save/{id?}',[CategoryController::class,'form'])->name('category-create');
    //post method for create and update category
    Route::post('category/add/{id?}',[CategoryController::class,'create'])->name('category.post');

    //delete category 
    Route::delete('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    

});
