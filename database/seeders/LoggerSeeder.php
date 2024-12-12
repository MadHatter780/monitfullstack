<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Logger;

class LoggerSeeder extends Seeder
{
    public function run()
    {
        Logger::factory()->count(100)->create();
    }
}
