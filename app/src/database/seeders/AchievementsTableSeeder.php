<?php
//----------------------------------------------------------
// アチーブメントテーブルシーダー [AchievementsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/26
// Update:2024/08/26
//----------------------------------------------------------

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementsTableSeeder extends Seeder
{
    public function run(): void
    {
        Achievement::create([
            "name" => "Achievement 1",
            "reward_item_id" => 4,
            "quantity" => 1,
            "acquisition_conditions" => 1,  // 1:アイテム関連 2:ステージ関連
            "clear_condition" => 1,         // 1 → アイテムID , 2 → 1:プレイ回数 2:ステージID 3:クリエイト回数
            "achievement_value" => 5        // 1 → 個数 , 2 → 1・3:達成回数 2:目標のステージID
        ]);
        Achievement::create([
            "name" => "Achievement 2",
            "reward_item_id" => 3,
            "quantity" => 5,
            "acquisition_conditions" => 1,
            "clear_condition" => 4,
            "achievement_value" => 1
        ]);
        Achievement::create([
            "name" => "Achievement 3",
            "reward_item_id" => 2,
            "quantity" => 10,
            "acquisition_conditions" => 2,
            "clear_condition" => 1,
            "achievement_value" => 1
        ]);
        Achievement::create([
            "name" => "Achievement 4",
            "reward_item_id" => 2,
            "quantity" => 10,
            "acquisition_conditions" => 2,
            "clear_condition" => 2,
            "achievement_value" => 5
        ]);
        Achievement::create([
            "name" => "Achievement 5",
            "reward_item_id" => 1,
            "quantity" => 20,
            "acquisition_conditions" => 2,
            "clear_condition" => 3,
            "achievement_value" => 5
        ]);
    }
}
