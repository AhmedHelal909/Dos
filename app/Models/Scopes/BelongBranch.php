<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class BelongBranch implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        // if(Auth::check()){
        //     if (!in_array(null, auth()->user()->branch_id)) {
        //         $builder->where(function ($query) {
        //             $x= auth()->user()->branch_id;
        //             for($i=0;$i<count($x); $i++){

        //                 $query->whereJsonContains('branch_id', $x[$i],'or');
        //             }
        //         });
        //     }
        // }
    }
}
