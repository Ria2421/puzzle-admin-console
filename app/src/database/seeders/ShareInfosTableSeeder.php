<?php
//--------------------------------------------------
// 共有情報シーダー [ShareInfosTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/08/26
// Update:2024/08/26
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\ShareInfo;
use Illuminate\Database\Seeder;

class ShareInfosTableSeeder extends Seeder
{
    public function run(): void
    {
        ShareInfo::create(["user_id" => 1, "stage_id" => 1]);
        ShareInfo::create(["user_id" => 1, "stage_id" => 2]);
        ShareInfo::create(["user_id" => 1, "stage_id" => 3]);
    }
}
