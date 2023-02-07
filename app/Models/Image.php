<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Image extends Model
{
    use HasFactory ,HasTranslations;
    protected $guarded = [];
    public $translatable = ['key'];

    protected $appended=['image_path'];

    public function getImagePathAttribute()
    {
        return $this->image !=null ? asset('uploads/images/'.$this->image) : asset('uploads/images/default.png');
    }

}
