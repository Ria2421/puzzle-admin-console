<?php
//-------------------------------------------------------------------------
// アイテムマイグレーション [2024_06_17_105451_create_items_table.php]
// Author:Kenta Nakamoto
//  Data :2024/06/17
// Update:2024/08/22
//-------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);     // アイテム名
            $table->smallInteger('type');         // 1.消費 2.装備
            $table->integer('effect_value');      // 効果量
            $table->text('text');                 // 説明文
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
