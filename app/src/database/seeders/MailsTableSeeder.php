<?php

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
