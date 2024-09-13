<?php
//------------------------------------------------------------
// クリエイトステージテーブルシーダー [CreateStagesTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/26
// Update:2024/08/26
//------------------------------------------------------------

namespace Database\Seeders;

use App\Models\CreateStage;
use Illuminate\Database\Seeder;

class CreateStagesTableSeeder extends Seeder
{
    public function run(): void
    {
        CreateStage::create([
            "name" => "sample1",
            "user_id" => 1,
            "gimmick_pos" => "{}",
            "good_vol" => 1
        ]);
        CreateStage::create([
            "name" => "sample2",
            "user_id" => 1,
            "gimmick_pos" => "{}",
            "good_vol" => 2
        ]);
        CreateStage::create([
            "name" => "sample3",
            "user_id" => 1,
            "gimmick_pos" => "{}",
            "good_vol" => 3
        ]);
        CreateStage::create([
            "name" => "sample4",
            "user_id" => 3,
            "gimmick_pos" => "{}",
            "good_vol" => 5
        ]);
        CreateStage::create([
            "name" => "sample5",
            "user_id" => 4,
            "gimmick_pos" => "{}",
            "good_vol" => 0
        ]);
        CreateStage::create([
            "name" => "sample6",
            "user_id" => 5,
            "gimmick_pos" => "{}",
            "good_vol" => 88
        ]);
    }
}

