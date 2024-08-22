<?php
//--------------------------------------------------
// 所持品テーブルシーダー [HaveItemsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/06/18
// Update:2024/08/22
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\HaveItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HaveItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HaveItem::create(['user_id' => 1, 'item_id' => 1, 'quantity' => 10]);
        HaveItem::create(['user_id' => 2, 'item_id' => 3, 'quantity' => 4]);
        HaveItem::create(['user_id' => 3, 'item_id' => 4, 'quantity' => 1]);
    }
}
