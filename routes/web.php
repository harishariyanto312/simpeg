<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('index')->middleware(['auth']);

Route::resource('groups', Controllers\GroupController::class);

Route::get('groups/{group}/permissions', [Controllers\PermissionController::class, 'edit'])->name('groups.permissions');
Route::put('groups/{group}/permissions', [Controllers\PermissionController::class, 'update']);

Route::resource('users', Controllers\UserController::class);
Route::put('users/{user}/update-password', [Controllers\UserController::class, 'update_password'])->name('users.update_password');
Route::post('users/{user}/update-avatar', [Controllers\UserController::class, 'update_avatar'])->name('users.update_avatar');
Route::get('users-json', [Controllers\UserController::class, 'jsonIndex'])->name('users.index.json');

Route::resource('employees', Controllers\EmployeeController::class);
Route::get('employees-json', [Controllers\EmployeeController::class, 'jsonIndex'])->name('employees.index.json');

Route::get('change-password', [Controllers\HomeController::class, 'editPassword'])->middleware(['auth'])->name('change_password');
Route::put('change-password', [Controllers\HomeController::class, 'updatePassword'])->middleware(['auth']);

Route::resource('employee-status', Controllers\EmployeeStatusController::class);
Route::get('employee-status-json', [Controllers\EmployeeStatusController::class, 'jsonIndex'])->name('employee-status.index.json');

Route::resource('group-shift', Controllers\GroupShiftController::class);
Route::get('group-shift-json', [Controllers\GroupShiftController::class, 'jsonIndex'])->name('group-shift.index.json');

Route::resource('grades', Controllers\GradeController::class);
Route::get('grades-json', [Controllers\GradeController::class, 'jsonIndex'])->name('grades.index.json');

Route::resource('titles', Controllers\TitleController::class);
Route::get('titles-json', [Controllers\TitleController::class, 'jsonIndex'])->name('titles.index.json');

Route::resource('locations', Controllers\LocationController::class);
Route::get('locations-json', [Controllers\LocationController::class, 'jsonIndex'])->name('locations.index.json');

Route::resource('accounts', Controllers\AccountController::class);
Route::get('accounts-json', [Controllers\AccountController::class, 'jsonIndex'])->name('accounts.index.json');

Route::resource('banks', Controllers\BankController::class);
Route::get('banks-json', [Controllers\BankController::class, 'jsonIndex'])->name('banks.index.json');

Route::resource('company-bank-accounts', Controllers\CompanyBankAccountController::class);
Route::get('company-bank-accounts-json', [Controllers\CompanyBankAccountController::class, 'jsonIndex'])->name('company-bank-accounts.index.json');

require __DIR__.'/auth.php';
