<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getStatusAttribute($value)
    {
        return $value == 1 ? __('site.ACTIVE') : __('site.notACTIVE');
    }

}
