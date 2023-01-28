<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;


class Delivery extends Authenticatable
{
    use HasFactory , Notifiable,HasRoles;
    protected $appended=['image_path','pdf_path'];
    protected $guard_name = 'delivery';
    protected $guarded = [];
    public function getImagePathAttribute()
    {
        return $this->image !=null ? asset('uploads/deliveries/'.$this->image) : asset('uploads/deliveries/default.png');
    }
}
