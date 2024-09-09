<?php
//-------------------------------------------------
// APIルート [api.php]
// Author:Kenta Nakamoto
// Data:2024/07/08
//-------------------------------------------------

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\NoCacheMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(NoCacheMiddleware::class)->group(function () {

    //-----------------------------------------------------------------------------------------------
    // ユーザー関連 ---------------

    // 所持アイテム更新処理
    Route::post('users/items/update', [UserController::class, 'itemUpdate'])->name('users.items.update');
    // 指定ユーザーの所持アイテムリスト取得
    Route::get('users/items/{user_id}', [UserController::class, 'items'])->name('users.items');
    // 指定ユーザーIDのフォローデータ取得
    Route::get('users/follows/{user_id}', [UserController::class, 'follows'])->name('users.follows');
    // フォロー登録処理
    Route::post('users/follows/store', [UserController::class, 'followStore'])->name('users.follows.store');
    // フォロー解除処理
    Route::post('users/follows/destroy', [UserController::class, 'followDestroy'])->name('users.follows.destroy');
    // ユーザーの登録
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    // ユーザー情報の更新
    Route::post('users/update', [UserController::class, 'update'])->name('users.update');
    // 指定ユーザーIDのデータを取得
    Route::get('users/{user_id}', [UserController::class, 'show'])->name('users.show');
    // 指定ユーザーIDのプロフィール情報を取得
    Route::get('users/summary/{user_id}', [UserController::class, 'getSummary'])->name('users.summary');

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
    // 受信メール開封処理
    Route::post('mails/update', [MailController::class, 'update'])->name('mails.update');

    //-----------------------------------------------------------------------------------------------
    // ステージ関連 -----------------

    // ノーマルステージデータ取得処理
    Route::get('stages/normal', [StageController::class, 'getNormal'])->name('stages.normal');
    // ステージプレイログ登録処理
    Route::post('stages/store/result', [StageController::class, 'storeResult'])->name('stages.result.store');
    // ステージ共有処理
    Route::post('stages/share', [StageController::class, 'share'])->name('stages.share');
    // 指定IDのクリエイトステージを取得
    Route::get('stages/create/{stage_id}', [StageController::class, 'createID'])->name('stages.create');
    // 指定ユーザーのクリエイトステージを取得
    Route::get('stages/create/user/{user_id}', [StageController::class, 'createUser'])->name('stages.create.user');
    // フォローユーザーのクリエイトステージを取得
    Route::get('stages/create/follow/{user_id}',
        [StageController::class, 'getFollowStage'])->name('stages.create.follow');
    // イイネが多い順で30件取得
    Route::get('stages/create/good', [StageController::class, 'getGood'])->name('stages.create.good');
    // フォローが共有したステージを30件取得
    Route::get('stages/create/share/{user_id}', [StageController::class, 'getShare'])->name('stages.create.share');
    // イイネ数の更新処理
    Route::post('stages/update/good', [StageController::class, 'updateGood'])->name('stages.update.good');
    // クリエイトステージデータを登録
    Route::post('stages/create/store', [StageController::class, 'storeStage'])->name('stages.create.store');
    // 指定IDのクリエイトステージデータを消去
    Route::post('stages/create/destroy',
        [StageController::class, 'destroyStage'])->name('stages.create.destroy');
});
