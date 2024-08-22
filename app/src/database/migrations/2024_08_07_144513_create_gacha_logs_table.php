<?php
//-------------------------------------------------------------------------
// ガチャログマイグレーション [2024_08_07_144513_create_gacha_logs_table.php]
// Author:Kenta Nakamoto
//  Data :2024/08/07
// Update:2024/08/22
//-------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gacha_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');     // ユーザーID
            $table->integer('gacha_id');    // 引いたガチャID
            $table->integer('item_id');     // 排出ID
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gacha_logs');
    }
};
