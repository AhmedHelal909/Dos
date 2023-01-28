<?php

namespace App\Models\Scopes;

use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RoleScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        //  if(Auth::guard('vendor')->user()  ) {
        //     $builder->where('guard_name','vendor');
        // }
    }
}
