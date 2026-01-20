<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Backend\ClientManagement\ClientController;
use App\Http\Controllers\Backend\UserManagement\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\UserManagement\Resign;
use App\Http\Controllers\Backend\UserManagement\ResignController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'notBlocked'])->name('dashboard');



// Route::middleware(['auth', 'notBlocked'])->group(function () {
    
//     Route::resource('usermanage', UserManageController::class);
// });

Route::get('admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');

require __DIR__ . '/auth.php';

Route::middleware('auth', 'notBlocked')->group(function () {
    Route::resource('usermanage', UserController::class);
    Route::get('user-datatable', [UserController::class, 'userDataTable'])->name('user-datatable');

    Route::post('/usermanage/resign-submit', [UserController::class, 'resignSubmit'])->name('usermanage.resign.submit');
    Route::post('/usermanage/{id}/block',[UserController::class, 'blockUser'])->name('usermanage.block');
    Route::post('/usermanage/{id}/unblock',[UserController::class, 'unblockUser'])->name('usermanage.unblock');
    
    Route::post('/usermanage/{id}/toggle-block', [UserController::class, 'toggleBlock'])->name('usermanage.toggle-block');;

    Route::resource('resign-employees',ResignController::class);
    Route::get('resign-employee-datatable', [ResignController::class, 'resignEmployeeDataTable'])->name('resign-employee-datatable');
    Route::post('confirm/resign', [ResignController::class, 'confirm_resign'])->name('confirm_resign');

   

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/change-password', [PasswordController::class, 'edit'])->name('change-password.edit');
    Route::put('/change-password', [PasswordController::class, 'update'])->name('change-password.update');


     Route::resource('clientmanage', ClientController::class);
     Route::get('client-datatable', [ClientController::class, 'clientDataTable'])->name('client-datatable');

});

