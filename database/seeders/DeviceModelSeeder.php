<?php

namespace Database\Seeders;

use App\Models\DeviceModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeviceModel::create([
            'device_type_id' => 1,
            'slug' => str()->uuid(),
            'name' => 'Mi Lamp I',
            'image' => 'lamp-1.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 1,
            'slug' => str()->uuid(),
            'name' => 'Apple Fan Light',
            'image' => 'fan-light.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 4,
            'slug' => str()->uuid(),
            'name' => 'Speaker I',
            'image' => 'speaker-1.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 2,
            'slug' => str()->uuid(),
            'name' => 'AC Dingin',
            'image' => 'ac.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 3,
            'slug' => str()->uuid(),
            'name' => 'Samsung Smart TV',
            'image' => 'tv-1.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 3,
            'slug' => str()->uuid(),
            'name' => 'Apple Smart TV',
            'image' => 'tv-2.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 5,
            'slug' => str()->uuid(),
            'name' => 'Space-X Router',
            'image' => 'router-1.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 5,
            'slug' => str()->uuid(),
            'name' => 'Nasa Router',
            'image' => 'router-2.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 5,
            'slug' => str()->uuid(),
            'name' => 'Indihome Router',
            'image' => 'router-3.png'
        ]);
        DeviceModel::create([
            'device_type_id' => 4,
            'slug' => str()->uuid(),
            'name' => 'Amazon Speaker',
            'image' => 'speaker-2.png'
        ]);
    }
}
