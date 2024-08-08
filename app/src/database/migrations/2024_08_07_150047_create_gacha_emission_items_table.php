<?php
//-------------------------------------------------
// ガチャ排出アイテムマイグレーション
// Author:Kenta Nakamoto
// Data:2024/08/08
//-------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gacha_emission_items', function (Blueprint $table) {
            $table->id();
            $table->integer('gacha_id');        // ガチャID
            $table->integer('item_id');         // 排出アイテムID
            $table->string('rarity');           // レアリティ
            $table->integer('rarity_value');    // 重み
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gacha_emission_items');
    }
};
