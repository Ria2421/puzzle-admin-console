<?php
//----------------------------------------------------------
// ノーマルステージテーブルシーダー [NormalStagesTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/26
// Update:2024/08/26
//----------------------------------------------------------

namespace Database\Seeders;

use App\Models\NormalStage;
use Illuminate\Database\Seeder;

class NormalStagesTableSeeder extends Seeder
{
    public function run(): void
    {
        NormalStage::create(["item_id" => 1, "quantity" => 5]);
        NormalStage::create(["item_id" => 2, "quantity" => 5]);
    }
}
