<?php
//--------------------------------------------------
// メールテーブルシーダー [MailsTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/06/27
// Update:2024/08/22
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Seeder;

class MailsTableSeeder extends Seeder
{
    public function run(): void
    {
        Mail::create(['title' => 'test', 'content' => 'test']);
        Mail::create(['title' => 'sample', 'content' => 'sample']);
    }
}
