<?php
//-------------------------------------------------------------------------
// メールマイグレーション [2024_06_27_053213_create_mails_table.php]
// Author:Kenta Nakamoto
//  Data :2024/06/27
// Update:2024/08/22
//-------------------------------------------------------------------------

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);   // 題名
            $table->text('content');              // 本文
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
