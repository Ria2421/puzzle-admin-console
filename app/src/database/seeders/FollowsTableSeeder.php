<?php

namespace Database\Seeders;

use App\Models\Follow;
use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    public function run(): void
    {
        Follow::create(['user_id' => 1, 'follow_id' => 2]);
        Follow::create(['user_id' => 1, 'follow_id' => 3]);
        Follow::create(['user_id' => 1, 'follow_id' => 4]);
        Follow::create(['user_id' => 1, 'follow_id' => 5]);
        Follow::create(['user_id' => 1, 'follow_id' => 6]);

        Follow::create(['user_id' => 2, 'follow_id' => 1]);
        Follow::create(['user_id' => 2, 'follow_id' => 3]);
        Follow::create(['user_id' => 2, 'follow_id' => 4]);
        Follow::create(['user_id' => 2, 'follow_id' => 5]);

        Follow::create(['user_id' => 3, 'follow_id' => 4]);
        Follow::create(['user_id' => 3, 'follow_id' => 8]);
        Follow::create(['user_id' => 3, 'follow_id' => 9]);
        Follow::create(['user_id' => 3, 'follow_id' => 6]);
    }
}
