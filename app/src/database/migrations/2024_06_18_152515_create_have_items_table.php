<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('have_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');     // 所持ユーザーID
            $table->integer('item_id');     // 所持アイテムID
            $table->integer('quantity');    // 所持数
            $table->timestamps();

            // 2つのidにユニーク制約設定
            $table->unique(['user_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('have_items');
    }
};
