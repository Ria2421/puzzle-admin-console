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
            "gimmick_pos" => "",
            "good_vol" => 1
        ]);
        CreateStage::create([
            "name" => "sample2",
            "user_id" => 1,
            "gimmick_pos" => "",
            "good_vol" => 2
        ]);
        CreateStage::create([
            "name" => "sample3",
            "user_id" => 1,
            "gimmick_pos" => "",
            "good_vol" => 3
        ]);
    }
}

