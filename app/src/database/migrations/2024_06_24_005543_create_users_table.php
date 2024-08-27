<?php
//-------------------------------------------------------------------------
// ユーザーマイグレーション [2024_06_17_105451_create_have_items_table.php]
// Author:Kenta Nakamoto
//  Data :2024/06/17
// Update:2024/08/22
//-------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);    // ユーザー名 (最大文字数32)
            $table->integer('icon_id');           // アイコン画像ID(デフォが1)
            $table->timestamps();
            $table->unique('name');     // nameにユニーク制約設定
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
