<?php

use Illuminate\Support\Facades\Auth;


if(!function_exists('get_guard')){
    function get_guard(){
        if(Auth::guard('vendor')->check())
            {return "vendor";}
        elseif(Auth::guard('web')->check())
            {return "web";}
        else{
            return "delivery";
        }
    }
}



