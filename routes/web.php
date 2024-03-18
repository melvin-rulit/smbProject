<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSubAccountsListController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [UserController::class, 'current']);
    Route::get('/roles', [UserController::class, 'getRoles']);

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.list');
    });

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
        Route::get('/exchange', [UserSubAccountsListController::class, 'getExchanges']);
//        Route::post('/', [BranchController::class, 'store']);
//        Route::get('/{id}', [BranchController::class, 'show']);
//        Route::put('/{id}', [BranchController::class, 'update']);
//        Route::delete('/{id}', [BranchController::class, 'delete']);
    });


    Route::get('/', [IndexController::class, 'index'])->name('dashboard');
});

Auth::routes();
