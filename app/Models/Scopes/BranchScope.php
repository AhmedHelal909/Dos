<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class BranchScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
       if(auth('pharmacy')->user() != null){
           $builder->where(function ($query) {
               $ids = auth('pharmacy')->user()->id;
                $ids = json_encode($ids);
               $query->whereJsonContains('pharmacy_ids', $ids);
           });
       }

    }

}
