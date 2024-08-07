<?php
//-------------------------------------------------
// クリエイトステージマイグレーション
// Author:Kenta Nakamoto
// Data:2024/08/08
//-------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('create_stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // ステージ名
            $table->unsignedInteger('user_id');     // 作成者ユーザーID
            $table->json('gimmick_pos');            // ギミック座標情報
            $table->unsignedInteger('good_vol');    // イイネ数
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('create_stages');
    }
};
