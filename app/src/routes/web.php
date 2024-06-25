<?php
//-------------------------------------------------
// ルート [Web.php]
// Author:Kenta Nakamoto
// Data:2024/06/11
//-------------------------------------------------

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

// ログイン画面の表示
Route::get('/', [AuthController::class, 'index'])->name('auth.index');

// ログイン画面の表示
Route::get('authentications/index', [AuthController::class, 'index'])->name('auth.index');

// ログイン処理
Route::post('authentications/login', [AuthController::class, 'login'])->name('auth.login');

// ログアウト処理
Route::post('authentications/logout', [AuthController::class, 'logout'])->name('auth.logout');

// アカウントルート
Route::prefix('accounts')->name('accounts.')->controller(AccountController::class)
    ->middleware(AuthMiddleware::class)->group(function () {
        Route::get('index/{account_id?}', 'index')->name('index');             // アカウントの表示
        Route::post('show', 'index')->name('show');                            // 指定アカウントの表示
        Route::get('create', 'create')->name('create');                        // 登録画面の表示
        Route::post('store', 'store')->name('store');                          // 登録処理
        Route::get('storeComp', 'storeComplete')->name('storeComp');           // 登録完了画面の表示
        Route::get('{id}/destroyConf', 'destroyConf')->name('destroyConf');    // 削除確認画面
        Route::get('{id}/destroy', 'destroy')->name('destroy');                // 削除処理
        Route::get('{name}/destroyComp', 'destroyComp')->name('destroyComp');  // 削除完了画面の表示
        Route::get('showUpdate', 'showUpdate')->name('showUpdate');            // 更新画面の表示
        Route::post('{id}/update', 'update')->name('update');                  // 更新処理
        Route::get('{name}/updateComp', 'updateComp')->name('updateComp');     // 更新完了表示
    });

Route::middleware(AuthMiddleware::class)->group(function () {
    // プレイヤーの表示
    Route::get('users/index/{user_id?}', [UserController::class, 'index'])->name('users.index');

    // 所持アイテムの表示
    Route::get('users/haveItems/{user_id?}', [UserController::class, 'showItem'])->name('users.showItem');

    // アイテムの表示
    Route::get('items/index/{item_id?}', [ItemController::class, 'index'])->name('items.index');
});
