<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('receive_mails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('mail_id');
            $table->integer('send_item_id');
            $table->boolean('unsealed_flag');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receive_mail_lists');
    }
};
