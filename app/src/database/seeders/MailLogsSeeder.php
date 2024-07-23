<?php

namespace Database\Seeders;

use App\Models\MailLogs;
use Illuminate\Database\Seeder;

class MailLogsSeeder extends Seeder
{
    public function run(): void
    {
        MailLogs::create(["user_id" => 50, "mail_id" => 1, "send_item_id" => 1, "action" => 1]);
        MailLogs::create(["user_id" => 50, "mail_id" => 1, "send_item_id" => 1, "action" => 2]);
    }
}
