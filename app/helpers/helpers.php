<?php

use App\Enum\MonthEnum;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

if(!function_exists('get_guard')){
    function get_guard(){
        if(Auth::guard('pharmacy')->check())
            {return "pharmacy";}
        elseif(Auth::guard('web')->check())
            {return "web";}
//        else{
//            return "delivery";
//        }
    }


}
if(!function_exists('get_month')){
    function get_month($date){
        $x = Carbon::parse($date)->month;
        $y = MonthEnum::getList()[$x];
        return $y.' '.Carbon::parse($date)->year;
    }
}

// settings
if(!function_exists('get_setting')){
    function get_setting($key){
        $lang = app()->getLocale();
        $setting = \App\Models\Setting::where('key->'. $lang, $key)->first();
        return $setting->value ?? '';
    }
}

// images
if(!function_exists('get_image')){
    function get_image($image){
        $lang = app()->getLocale();
        $img = \App\Models\Image::where('key->'. $lang, $image)->first();
        if ($img){
            return asset('uploads/images/'.$img->image);
        }else{
            return asset('uploads/images/default.png');
        }

    }
}



