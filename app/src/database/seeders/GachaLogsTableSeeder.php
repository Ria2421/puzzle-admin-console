<?php
//--------------------------------------------------
// ガチャログテーブルシーダー [GachaLogsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/22
// Update:2024/08/26
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\GachaLog;
use Illuminate\Database\Seeder;

class GachaLogsTableSeeder extends Seeder
{
    public function run(): void
    {
        GachaLog::create(["user_id" => 1, "gacha_id" => 1, "item_id" => 1]);
        GachaLog::create(["user_id" => 1, "gacha_id" => 1, "item_id" => 2]);
        GachaLog::create(["user_id" => 1, "gacha_id" => 1, "item_id" => 3]);
        GachaLog::create(["user_id" => 1, "gacha_id" => 1, "item_id" => 4]);
    }
}
