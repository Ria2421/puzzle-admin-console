<?php
//-------------------------------------------------------------------------
// アイテムログマイグレーション [2024_07_23_030236_create_item_logs_table.php]
// Author:Kenta Nakamoto
//  Data :2024/07/23
// Update:2024/08/22
//-------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('item_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();    // 操作を行ったユーザーID
            $table->integer('target_item_id');      // 使用したアイテムID
            $table->integer('action');              // 操作内容 [1:消費 2:入手]
            $table->integer('quantity');            // 操作した個数
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_logs');
    }
};
