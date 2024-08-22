<?php
//--------------------------------------------------
// 添付アイテムテーブルシーダー [SendItemsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/06/27
// Update:2024/08/22
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\SendItem;
use Illuminate\Database\Seeder;

class SendItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        SendItem::create(['item_id' => 1, 'quantity' => 10]);
        SendItem::create(['item_id' => 4, 'quantity' => 1]);
        SendItem::create(['item_id' => 2, 'quantity' => 5]);
        SendItem::create(['item_id' => 3, 'quantity' => 1]);
    }
}
