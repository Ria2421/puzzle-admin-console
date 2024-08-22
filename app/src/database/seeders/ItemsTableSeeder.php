<?php
//--------------------------------------------------
// アイテムテーブルシーダー [ItemsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/06/18
// Update:2024/08/22
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create(['name' => 'やくそう', 'type' => '1', 'effect_value' => 10, 'text' => 'HPを少し回復']);
        Item::create(['name' => '上やくそう', 'type' => '1', 'effect_value' => 25, 'text' => 'HPを回復']);
        Item::create(['name' => '特やくそう', 'type' => '1', 'effect_value' => 50, 'text' => 'HPをかなり回復']);
        Item::create(['name' => 'はねのくつ', 'type' => '2', 'effect_value' => 8, 'text' => '素早さが上がる']);
    }
}
