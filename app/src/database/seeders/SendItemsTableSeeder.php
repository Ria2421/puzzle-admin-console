<?php

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
