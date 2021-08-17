<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RecycleController;
use App\Http\Controllers\SummaryController;

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

//admin panel routes start
Route::get('admin', [AdminController::class, 'index']);

Route::get('admin/user', [UserController::class, 'index']);
Route::get('admin/user/add', [UserController::class, 'add']);
Route::get('admin/user/edit/{slug}', [UserController::class, 'edit']);
Route::get('admin/user/view/{slug}', [UserController::class, 'view']);
Route::post('admin/user/submit', [UserController::class, 'insert']);
Route::post('admin/user/update', [UserController::class, 'update']);
Route::post('admin/user/softdelete', [UserController::class, 'softdelete']);
Route::post('admin/user/restore', [UserController::class, 'restore']);
Route::post('admin/user/delete', [UserController::class, 'delete']);
Route::get('admin/user/profile/{slug}',[UserController::class, 'profile']);
Route::get('user/full-profile/{slug}',[UserController::class, 'fullProfile']);
Route::get('user/edit-password/{slug}',[UserController::class, 'editPassword']);
Route::post('/user/profile/password_update',[UserController::class, 'password_update']);
Route::get('user/edit-profile/{slug}',[UserController::class,'editProfile']);
Route::post('user/profile/profile_update',[UserController::class, 'profile_update']);




Route::get('admin/income/category', [IncomeCategoryController::class, 'index']);
Route::get('admin/income/category/add', [IncomeCategoryController::class, 'add']);
Route::get('admin/income/category/edit/{slug}', [IncomeCategoryController::class, 'edit']);
Route::get('admin/income/category/view/{slug}', [IncomeCategoryController::class, 'view']);
Route::post('admin/income/category/submit', [IncomeCategoryController::class, 'insert']);
Route::post('admin/income/category/update', [IncomeCategoryController::class, 'update']);
Route::post('admin/income/category/softdelete', [IncomeCategoryController::class, 'softdelete']);
Route::post('admin/income/category/restore', [IncomeCategoryController::class, 'restore']);
Route::post('admin/income/category/delete', [IncomeCategoryController::class, 'delete']);

Route::get('admin/expense/category', [ExpenseCategoryController::class, 'index']);
Route::get('admin/expense/category/add', [ExpenseCategoryController::class, 'add']);
Route::get('admin/expense/category/edit/{slug}', [ExpenseCategoryController::class, 'edit']);
Route::get('admin/expense/category/view/{slug}', [ExpenseCategoryController::class, 'view']);
Route::post('admin/expense/category/submit', [ExpenseCategoryController::class, 'insert']);
Route::post('admin/expense/category/update', [ExpenseCategoryController::class, 'update']);
Route::post('admin/expense/category/softdelete', [ExpenseCategoryController::class, 'softdelete']);
Route::post('admin/expense/category/restore', [ExpenseCategoryController::class, 'restore']);
Route::post('admin/expense/category/delete', [ExpenseCategoryController::class, 'delete']);

Route::get('admin/income', [IncomeController::class, 'index']);
Route::get('admin/income/add', [IncomeController::class, 'add']);
Route::get('admin/income/edit/{slug}', [IncomeController::class, 'edit']);
Route::get('admin/income/view/{slug}', [IncomeController::class, 'view']);
Route::post('admin/income/submit', [IncomeController::class, 'insert']);
Route::post('admin/income/update', [IncomeController::class, 'update']);
Route::post('admin/income/softdelete', [IncomeController::class, 'softdelete']);
Route::post('admin/income/restore', [IncomeController::class, 'restore']);
Route::post('admin/income/delete', [IncomeController::class, 'delete']);

Route::get('admin/expense', [ExpenseController::class, 'index']);
Route::get('admin/expense/add', [ExpenseController::class, 'add']);
Route::get('admin/expense/edit/{slug}', [ExpenseController::class, 'edit']);
Route::get('admin/expense/view/{slug}', [ExpenseController::class, 'view']);
Route::post('admin/expense/submit', [ExpenseController::class, 'insert']);
Route::post('admin/expense/update', [ExpenseController::class, 'update']);
Route::post('admin/expense/softdelete', [ExpenseController::class, 'softdelete']);
Route::post('admin/expense/restore', [ExpenseController::class, 'restore']);
Route::post('admin/expense/delete', [ExpenseController::class, 'delete']);

Route::get('admin/recycle', [RecycleController::class, 'index']);
Route::get('admin/recycle/user', [RecycleController::class, 'user']);
Route::get('admin/recycle/income/category', [RecycleController::class, 'income_category']);
Route::get('admin/recycle/income', [RecycleController::class, 'income']);
Route::get('admin/recycle/expense', [RecycleController::class, 'expense']);

Route::get('admin/summary', [SummaryController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
