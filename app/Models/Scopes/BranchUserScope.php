<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class BranchUserScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        // if (Auth::check()) {
        //     if (!in_array(null, auth()->user()->branch_id)) {
        //         $builder->where(function ($query) {
        //             $query->whereJsonContains('branch_id',auth()->user()->branch_id[0]);
        //         });
        //     }

        // }
    }
}
