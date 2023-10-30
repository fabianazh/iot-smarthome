<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    use HasFactory;

    public function deviceType(){
        return $this->belongsTo(DeviceType::class, 'device_type_id');
    }

    public function devices(){
        return $this->hasMany(Device::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
