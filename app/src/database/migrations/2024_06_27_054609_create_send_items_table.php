<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('send_items', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');     // アイテムID
            $table->integer('quantity');    // 添付数
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('send_items');
    }
};
