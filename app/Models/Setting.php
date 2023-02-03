<?php

namespace App\Models;

use App\Models\Scopes\BelongBranch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory ,HasTranslations;
    protected $guarded = [];
    public $translatable = ['key'];



}
