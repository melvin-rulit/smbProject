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
        Route::get('/', [UserSubAccountsListController::class, 'getAllSubAccounts']);
        Route::post('/', [UserController::class, 'store']);
//        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'delete']);

        Route::get('/managers', [UserController::class, 'managersList']);
        Route::get('/admins', [UserController::class, 'adminsList']);
        Route::get('/investors', [UserController::class, 'investorsList']);

    });

    Route::group(['prefix' => 'trade'], function () {
//        Route::get('/', [BranchController::class, 'index'])->name('trade.list');
        Route::get('/', [UserSubAccountsListController::class, 'getAllSubAccounts']);
//        Route::post('/', [BranchController::class, 'store']);
//        Route::get('/{id}', [BranchController::class, 'show']);
//        Route::put('/{id}', [BranchController::class, 'update']);
//        Route::delete('/{id}', [BranchController::class, 'delete']);
    });


    Route::get('/', [IndexController::class, 'index'])->name('dashboard');
});

Auth::routes();
