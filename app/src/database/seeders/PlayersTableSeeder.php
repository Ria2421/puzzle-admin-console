<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::create(['name' => 'jobi', 'level' => 10, 'exp' => 100, 'life' => 3]);
        Player::create(['name' => 'hoge', 'level' => 22, 'exp' => 1050, 'life' => 25]);
        Player::create(['name' => 'huga', 'level' => 23, 'exp' => 1120, 'life' => 33]);
    }
}
