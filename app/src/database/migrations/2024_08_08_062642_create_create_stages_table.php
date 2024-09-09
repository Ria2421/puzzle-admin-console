<?php
//-------------------------------------------------------------------------
// クリエイトステージマイグレーション [2024_08_08_062642_create_create_stages_table.php]
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
        Schema::create('create_stages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);                         // ステージ名
            $table->unsignedInteger('user_id');                       // 作成者ユーザーID
            $table->string('gimmick_pos');                            // ギミック座標情報
            $table->unsignedInteger('good_vol')->default(0);    // イイネ数
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('create_stages');
    }
};
