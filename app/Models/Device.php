<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function model(){
        return $this->belongsTo(DeviceModel::class, 'device_model_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    protected $fillable = [
        'id','user_id','device_model_id','slug','name','room','status'
    ];
}
