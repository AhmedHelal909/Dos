<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable implements JWTSubject
{
    use HasFactory,HasRoles,Notifiable ;
    protected $guarded = [];
    protected $guard_name = 'customer';

    protected $appended=['image_path'];
    public function getImagePathAttribute()
    {
        return $this->image !=null ? asset('uploads/customers/'.$this->image) : asset('uploads/customers/default.png');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
