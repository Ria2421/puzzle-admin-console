<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('receive_mails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');         // 送信先のユーザーID
            $table->integer('mail_id');         // メールID
            $table->integer('send_item_id');    // 添付アイテムID
            $table->boolean('unsealed_flag');   // 開封フラグ
            $table->timestamps();

            $table->unique('user_id', 'mail_id');     // ユニーク制約設定
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receive_mail_lists');
    }
};
