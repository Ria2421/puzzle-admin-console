<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('follow_id')->unsigned()->index();
            $table->timestamps();

            // usersテーブルを親とし、関連する親のレコードが削除されたときに該当するレコードを削除する
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('follow_id')->references('id')->on('users')->onDelete('cascade');

            // 2つのidにユニーク制約設定
            $table->unique(['user_id', 'follow_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
