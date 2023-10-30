<?php

namespace Database\Seeders;

use App\Models\DeviceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeviceType::create([
            'name' => 'Lighting'
        ]);
        DeviceType::create([
            'name' => 'Air Conditioner'
        ]);
        DeviceType::create([
            'name' => 'Television'
        ]);
        DeviceType::create([
            'name' => 'Speaker'
        ]);
        DeviceType::create([
            'name' => 'Router'
        ]);
    }
}
