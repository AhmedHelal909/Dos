<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Pharmacy extends Authenticatable
{
    use HasFactory,HasRoles,Notifiable;
    protected $guarded = [];
    protected $guard_name = 'pharmacy';

    protected $appended=['image_path'];
    public function getImagePathAttribute()
    {
        return $this->image !=null ? asset('uploads/pharmacies/'.$this->image) : asset('uploads/pharmacies/default.png');
    }


}
