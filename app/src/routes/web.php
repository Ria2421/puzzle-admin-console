<?php
//-------------------------------------------------
// ルート [Web.php]
// Author:Kenta Nakamoto
// Data:2024/06/11
//-------------------------------------------------

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HaveItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

// ログイン画面の表示
Route::get('/', [AuthController::class, 'index'])->name('login');

// ログイン画面の表示
Route::get('authentications/index', [AuthController::class, 'index']);

// ログイン処理
Route::post('authentications/login', [AuthController::class, 'login']);

// ログアウト処理
Route::post('authentications/logout', [AuthController::class, 'logout']);

// アカウントの表示
Route::get('accounts/index/{account_id?}', [AccountController::class, 'index']);
Route::post('accounts/searchAccount', [AccountController::class, 'index']);

// プレイヤーの表示
Route::get('players/index/{player_id?}', [PlayerController::class, 'index']);

// 所持アイテムの表示
Route::get('players/haveItems/{player_id?}', [PlayerController::class, 'showHaveItem']);

// アイテムの表示
Route::get('items/index/{item_id?}', [ItemController::class, 'index']);
