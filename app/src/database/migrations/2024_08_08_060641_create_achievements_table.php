<?php
//-------------------------------------------------------------------------
// アチーブメントマイグレーション [2024_08_08_060641_create_achievement_table.php]
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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name');                             // 称号名
            $table->unsignedInteger('reward_item_id');          // 報酬アイテムID
            $table->integer('quantity');                        // 個数
            $table->unsignedInteger('acquisition_conditions');  // 取得条件 (種別[アイテムやプレイ回数等])
            $table->unsignedInteger('clear_condition');         // 具体的な判別物 (アイテムIDや条件となる物)
            $table->integer('achievement_value');               // 条件達成値
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
