<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('follow_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();    // 操作を行ったユーザーID
            $table->integer('target_user_id');      // 対象のユーザーID
            $table->integer('action');              // [1:登録,2:解除]
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('follow_logs');
    }
};
