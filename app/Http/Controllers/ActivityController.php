<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceType;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view('dashboard.activity.index', [
            'title' => 'Smarthome activity',
            'devices' => Device::where('user_id', auth()->id())->get(),
            'type' => DeviceType::all()
        ]);
    }
}
