<?php

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



