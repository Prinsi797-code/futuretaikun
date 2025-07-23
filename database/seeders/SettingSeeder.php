<?php

namespace Database\Seeders;

use App\Models\Setting;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'key' => 'reminder_days',
            'value' => '5',
            'description' => 'Number of days after registration to send reminder email',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}