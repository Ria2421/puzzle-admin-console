<?php
//-------------------------------------------------
// 共有情報マイグレーション
// Author:Kenta Nakamoto
// Data:2024/08/08
//-------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('share_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');     // 共有したユーザーID
            $table->unsignedInteger('stage_id');    // 共有されたステージID
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('share_infos');
    }
};
