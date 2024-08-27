<?php
//------------------------------------------------------------------
// ガチャ排出アイテムテーブルシーダー [GachaEmissionItemsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/26
// Update:2024/08/26
//------------------------------------------------------------------

namespace Database\Seeders;

use App\Models\GachaEmissionItem;
use Illuminate\Database\Seeder;

class GachaEmissionItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        GachaEmissionItem::create(["gacha_id" => 1, "item_id" => 1, "rarity" => "ssr", "rarity_value" => 5]);
        GachaEmissionItem::create(["gacha_id" => 1, "item_id" => 2, "rarity" => "sr", "rarity_value" => 5]);
        GachaEmissionItem::create(["gacha_id" => 1, "item_id" => 3, "rarity" => "r", "rarity_value" => 5]);
        GachaEmissionItem::create(["gacha_id" => 1, "item_id" => 4, "rarity" => "r", "rarity_value" => 5]);
    }
}
