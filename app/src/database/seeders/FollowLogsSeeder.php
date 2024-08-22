<?php
//--------------------------------------------------
// フォローログテーブルシーダー [FollowLogsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/07/16
// Update:2024/08/22
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\FollowLogs;
use Illuminate\Database\Seeder;

class FollowLogsSeeder extends Seeder
{
    public function run(): void
    {
        FollowLogs::create(["user_id" => 1, "target_user_id" => 2, "action" => 1]);
        FollowLogs::create(["user_id" => 1, "target_user_id" => 2, "action" => 2]);
        FollowLogs::create(["user_id" => 3, "target_user_id" => 5, "action" => 1]);
        FollowLogs::create(["user_id" => 3, "target_user_id" => 8, "action" => 1]);
        FollowLogs::create(["user_id" => 3, "target_user_id" => 5, "action" => 2]);
    }
}
