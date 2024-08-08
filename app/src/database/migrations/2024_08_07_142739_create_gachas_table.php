<?php
//-------------------------------------------------
// ガチャマイグレーション
// Author:Kenta Nakamoto
// Data:2024/08/07
//-------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gachas', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // ガチャ名
            $table->string('text');             // 説明会
            $table->integer('ssr');             // ssr確率
            $table->integer('sr');              // sr確率
            $table->integer('r');               // r確率
            $table->boolean('event_flag');      // 開催フラグ
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gachas');
    }
};
