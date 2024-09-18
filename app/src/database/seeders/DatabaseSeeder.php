<?php
//--------------------------------------------------
// データベースシーダー [DataBaseSeeder.php]
// Author:Kenta Nakamoto
//  Data :2024/06/17
// Update:2024/08/26
//---------------------------------------------------

namespace Database\Seeders;

use App\Models\Follow;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 引数のrunを実行
        $this->call(AccountsTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        // $this->call(HaveItemsTableSeeder::class);
        $this->call(MailsTableSeeder::class);
        $this->call(SendItemsTableSeeder::class);
        // $this->call(ReceiveMailsSeeder::class);
        // $this->call(FollowsTableSeeder::class);
        // $this->call(FollowLogsSeeder::class);
        // $this->call(ItemLogsSeeder::class);
        // $this->call(MailLogsSeeder::class);
        // $this->call(GachasTableSeeder::class);
        // $this->call(GachaLogsTableSeeder::class);
        // $this->call(GachaEmissionItemsTableSeeder::class);
        $this->call(AchievementsTableSeeder::class);
        // $this->call(AchievementProgressTableSeeder::class);
        // $this->call(CreateStagesTableSeeder::class);
        $this->call(NormalStagesTableSeeder::class);
        // $this->call(PlayLogsTableSeeder::class);
        // $this->call(ShareInfosTableSeeder::class);
    }
}
