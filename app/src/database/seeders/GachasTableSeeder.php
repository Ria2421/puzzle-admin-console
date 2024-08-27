<?php
//--------------------------------------------------
// ガチャテーブルシーダー [GachasTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/26
// Update:2024/08/26
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\Gacha;
use Illuminate\Database\Seeder;

class GachasTableSeeder extends Seeder
{
    public function run(): void
    {
        Gacha::create([
            "name" => "normal",
            "text" => "恒常",
            "ssr" => 5,
            "sr" => 10,
            "r" => 85,
            "event_flag" => true
        ]);
        Gacha::create([
            "name" => "fes",
            "text" => "フェス",
            "ssr" => 10,
            "sr" => 20,
            "r" => 70,
            "event_flag" => false
        ]);
        Gacha::create([
            "name" => "limit",
            "text" => "限定",
            "ssr" => 5,
            "sr" => 15,
            "r" => 80,
            "event_flag" => false
        ]);
    }
}
