<?php
//-------------------------------------------------------------------------
// メールログマイグレーション [2024_07_23_051052_create_mail_logs_table.php]
// Author:Kenta Nakamoto
//  Data :2024/07/23
// Update:2024/08/22
//-------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();// 対象のユーザーID
            $table->integer('mail_id');         // 操作したメールID
            $table->integer('send_item_id');    // メール添付アイテムID
            $table->integer('action');          // 操作内容 [1:受信 2:開封]
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mail_logs');
    }
};
