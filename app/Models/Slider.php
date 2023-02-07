<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['title', 'description', 'image'];
    public function getStatusAttribute($value)
    {
        return $value == 1 ? __('site.ACTIVE') : __('site.notACTIVE');
    }

}
