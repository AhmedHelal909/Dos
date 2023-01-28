<?php

namespace App\Models;

use App\Models\Scopes\RoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public  $guard_name = '*';
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new RoleScope);
    }
  
}
