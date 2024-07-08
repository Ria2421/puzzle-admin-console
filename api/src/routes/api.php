<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\NoCacheMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(NoCacheMiddleware::class)->group(function () {

    //-----------------------------------------------------------------------------------------------
    // ユーザー関連 ---------------

    // 指定ユーザーの所持アイテムリスト
    Route::get('users/items/{user_id}', [UserController::class, 'items'])->name('users.items');
    // 指定ユーザーIDのフォローデータを取得
    Route::get('users/follows/{user_id}', [UserController::class, 'follows'])->name('users.follows');
    // 指定レベル範囲のユーザーデータを取得
    Route::get('users/index', [UserController::class, 'index'])->name('users.index');
    // 指定ユーザーIDのデータを取得
    Route::get('users/{user_id}', [UserController::class, 'show'])->name('users.show');

    //-----------------------------------------------------------------------------------------------
    // アイテム関連 ---------------

    // 全アイテムのリスト取得
    Route::get('items/index', [ItemController::class, 'index'])->name('items.index');

    //-----------------------------------------------------------------------------------------------
    // メール関連 -----------------

    // メールの全マスターデータを取得
    Route::get('mails/index', [MailController::class, 'index'])->name('mails.index');

    // 指定したユーザーIDの受信メールデータを取得
    Route::get('mails/receive/{user_id}', [MailController::class, 'receive'])->name('mails.receive');
});
