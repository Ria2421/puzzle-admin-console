<?php
//-------------------------------------------------------------------------
// プレイログマイグレーション [2024_08_08_063952_create_play_logs_table.php]
// Author:Kenta Nakamoto
//  Data :2024/08/08
// Update:2024/08/22
//-------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('play_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index();     // プレイしたユーザID
            $table->unsignedInteger('stage_id')->index();    // プレイしたステージID
            $table->unsignedInteger('stage_type');           // ステージタイプ(1.ノーマル 2.クリエイト)
            $table->boolean('clear_flag');                   // クリア判定(true:成功 false:失敗)
            $table->timestamps();

            // 2つのidにインデックス設定
            $table->index(['user_id', 'stage_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('play_logs');
    }
};
