<?php
//-------------------------------------------------
// アチーブメント進捗マイグレーション
// Author:Kenta Nakamoto
// Data:2024/08/08
//-------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('achievement_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');         // ユーザーID
            $table->unsignedInteger('achievement_id');  // 称号ID
            $table->integer('progress_vol');            // 進捗値
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievement_progress');
    }
};
