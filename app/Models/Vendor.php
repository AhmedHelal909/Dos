<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use HasFactory,HasRoles,Notifiable ;
    protected $guarded = [];
    protected $guard_name = 'vendor';
   
    protected $appended=['image_path'];
    public function getImagePathAttribute()
    {
        return $this->image !=null ? asset('uploads/vendors/'.$this->image) : asset('uploads/vendors/default.png');
    }

   
}
