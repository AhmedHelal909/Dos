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
        return $y;
    }


}



