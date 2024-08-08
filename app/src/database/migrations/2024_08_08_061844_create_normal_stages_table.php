<?php
//-------------------------------------------------
// ノーマルステージマイグレーション
// Author:Kenta Nakamoto
// Data:2024/08/08
//-------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('normal_stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');      // ステージ名
            $table->json('gimmick_pos'); // ギミック座標情報
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('normal_stages');
    }
};
