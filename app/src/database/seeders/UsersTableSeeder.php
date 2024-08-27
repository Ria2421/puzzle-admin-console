<?php
//--------------------------------------------------
// ユーザーテーブルシーダー [UsersTableSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/06/24
// Update:2024/08/22
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
    }
}
