<?php
//-------------------------------------------------
// プレイログマイグレーション
// Author:Kenta Nakamoto
// Data:2024/08/08
//-------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('play_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');     // プレイしたユーザID
            $table->unsignedInteger('stage_id');    // プレイしたステージID
            $table->unsignedInteger('stage_type');  // ステージタイプ(1.ノーマル 2.クリエイト)
            $table->boolean('clear_flag');          // クリア判定(true:成功 false:失敗)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('play_logs');
    }
};
