<?php
//----------------------------------------------------
// 受信メールテーブルシーダー [ReceiveMailsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/06/27
// Update:2024/08/22
//-----------------------------------------------------

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
