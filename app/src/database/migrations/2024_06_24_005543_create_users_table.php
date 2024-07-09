<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);     // ユーザー名
            $table->integer('level');             // レベル
            $table->integer('exp');               // 経験値
            $table->integer('life');              // ライフ
            $table->timestamps();

            $table->unique('name');     // nameにユニーク制約設定
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
