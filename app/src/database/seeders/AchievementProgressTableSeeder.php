<?php
//-------------------------------------------------------------------
// アチーブメント進捗テーブルシーダー [AchievementProgressTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/26
// Update:2024/08/26
//-------------------------------------------------------------------

namespace Database\Seeders;

use App\Models\AchievementProgress;
use Illuminate\Database\Seeder;

class AchievementProgressTableSeeder extends Seeder
{
    public function run(): void
    {
        AchievementProgress::create([
            "user_id" => 1,
            "achievement_id" => 1,
            "progress_vol" => 1
        ]);
        AchievementProgress::create([
            "user_id" => 1,
            "achievement_id" => 1,
            "progress_vol" => 2
        ]);
        AchievementProgress::create([
            "user_id" => 1,
            "achievement_id" => 1,
            "progress_vol" => 3
        ]);
    }
}
