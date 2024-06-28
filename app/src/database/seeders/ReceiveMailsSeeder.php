<?php

namespace Database\Seeders;

use App\Models\ReceiveMails;
use Illuminate\Database\Seeder;

class ReceiveMailsSeeder extends Seeder
{
    public function run(): void
    {
        ReceiveMails::create(['user_id' => 1, 'mail_id' => 1, 'send_item_id' => 1, 'unsealed_flag' => false]);
        ReceiveMails::create(['user_id' => 2, 'mail_id' => 1, 'send_item_id' => 1, 'unsealed_flag' => false]);
        ReceiveMails::create(['user_id' => 3, 'mail_id' => 1, 'send_item_id' => 1, 'unsealed_flag' => false]);
        ReceiveMails::create(['user_id' => 4, 'mail_id' => 2, 'send_item_id' => 2, 'unsealed_flag' => true]);
        ReceiveMails::create(['user_id' => 5, 'mail_id' => 2, 'send_item_id' => 2, 'unsealed_flag' => true]);
        ReceiveMails::create(['user_id' => 6, 'mail_id' => 2, 'send_item_id' => 2, 'unsealed_flag' => false]);
    }
}
