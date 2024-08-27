<?php
//----------------------------------------------------------
// プレイログテーブルシーダー [PlayLogsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/26
// Update:2024/08/26
//----------------------------------------------------------

namespace Database\Seeders;

use App\Models\PlayLog;
use Illuminate\Database\Seeder;

class PlayLogsTableSeeder extends Seeder
{
    public function run(): void
    {
        PlayLog::create(["user_id" => 1, "stage_id" => 1, "stage_type" => 1, "clear_flag" => true]);
        PlayLog::create(["user_id" => 1, "stage_id" => 2, "stage_type" => 1, "clear_flag" => true]);
        PlayLog::create(["user_id" => 1, "stage_id" => 3, "stage_type" => 1, "clear_flag" => true]);
    }
}
