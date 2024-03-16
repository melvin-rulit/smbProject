<?php

use App\Http\Controllers\DealController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserSubAccountsListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProxiController;
use App\Http\Controllers\ActiveController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClientController;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [UserController::class, 'current']);
    Route::get('/roles', [UserController::class, 'getRoles']);

    Route::group(['prefix' => 'sub_accounts'], function () {
        Route::get('/', [UserSubAccountsListController::class, 'list'])->name('sub_accounts.list');
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'delete']);

        Route::get('/managers', [UserController::class, 'managersList']);
        Route::get('/admins', [UserController::class, 'adminsList']);
        Route::get('/investors', [UserController::class, 'investorsList']);

    });

    Route::group(['prefix' => 'branches'], function () {
        Route::get('/', [BranchController::class, 'index'])->name('branches.list');
        Route::post('/', [BranchController::class, 'store']);
        Route::get('/{id}', [BranchController::class, 'show']);
        Route::put('/{id}', [BranchController::class, 'update']);
        Route::delete('/{id}', [BranchController::class, 'delete']);
    });

    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', [ClientController::class, 'index'])->name('clients.list');
        Route::post('/', [ClientController::class, 'store']);
        Route::get('/{id}', [ClientController::class, 'show']);
        Route::put('/{id}', [ClientController::class, 'update']);
        Route::delete('/{id}', [ClientController::class, 'delete']);
    });

    Route::group(['prefix' => 'proxies'], function () {
        Route::get('/', [ProxiController::class, 'index'])->name('proxies.list');
        Route::post('/', [ProxiController::class, 'store']);
        Route::get('/{id}', [ProxiController::class, 'show']);
        Route::put('/{id}', [ProxiController::class, 'update']);
        Route::delete('/{id}', [ProxiController::class, 'delete']);
        Route::get('/dict', [ProxiController::class, 'dict']);
    });

    Route::group(['prefix' => 'actives'], function () {
        Route::get('/', [ActiveController::class, 'index'])->name('actives.list');
        Route::post('/', [ActiveController::class, 'store']);
        Route::get('/{id}', [ActiveController::class, 'show']);
        Route::put('/{id}', [ActiveController::class, 'update']);
        Route::delete('/{id}', [ActiveController::class, 'delete']);
    });

    Route::group(['prefix' => 'deals'], function () {
        Route::get('/', [DealController::class, 'index'])->name('deals.list');
        Route::post('/', [DealController::class, 'store']);
        Route::get('/{id}', [DealController::class, 'show']);
        Route::put('/{id}', [DealController::class, 'update']);
        Route::delete('/{id}', [DealController::class, 'delete']);
    });

    Route::group(['prefix' => 'payments'], function () {
        Route::get('/', [PaymentController::class, 'index'])->name('payments.list');
        Route::post('/', [PaymentController::class, 'store']);
        Route::get('/{id}', [PaymentController::class, 'show']);
        Route::put('/{id}', [PaymentController::class, 'update']);
        Route::delete('/{id}', [PaymentController::class, 'delete']);
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/payments', [ReportController::class, 'findPaymentReports']);
        Route::get('/actives', [ReportController::class, 'findActiveReports']);
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.list');
    });

    Route::get('/', [IndexController::class, 'index'])->name('dashboard');
});

Auth::routes();
