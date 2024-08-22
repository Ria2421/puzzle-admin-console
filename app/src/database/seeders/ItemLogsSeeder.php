<?php
//--------------------------------------------------
// アイテムログテーブルシーダー [ItemLogsSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/07/23
// Update:2024/08/22
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\ItemLogs;
use Illuminate\Database\Seeder;

class ItemLogsSeeder extends Seeder
{
    public function run(): void
    {
        ItemLogs::create(["user_id" => 1, "target_item_id" => 2, "action" => 2, "quantity" => 5]);
        ItemLogs::create(["user_id" => 1, "target_item_id" => 2, "action" => 1, "quantity" => 5]);
        ItemLogs::create(["user_id" => 1, "target_item_id" => 2, "action" => 2, "quantity" => 5]);
        ItemLogs::create(["user_id" => 1, "target_item_id" => 1, "action" => 1, "quantity" => 1]);
    }
}
