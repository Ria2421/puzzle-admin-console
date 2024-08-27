<?php
//-------------------------------------------------------------------------
// ノーマルステージマイグレーション [2024_08_08_061844_create_normal_stages_table.php]
// Author:Kenta Nakamoto
//  Data :2024/08/08
// Update:2024/08/22
//-------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('normal_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('item_id');     // 報酬アイテムID
            $table->unsignedInteger('quantity');    // 個数
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('normal_stages');
    }
};
