<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'pharmacy_ids' => 'array'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    protected $appended=['image_path'];

    public function getImagePathAttribute()
    {
        return $this->image !=null ? asset('uploads/clients/'.$this->image) : asset('uploads/clients/default.png');
    }

    public function getStatusAttribute($value)
    {
     //1:pending,2:accepted,3:processing,4:completed
        switch ($value) {
            case 1:
                return __('site.pending');
                break;
            case 2:
                return __('site.accepted');
                break;
            case 3:
                return __('site.processing');
                break;
            case 4:
                return __('site.completed');
                break;
            default:
                return 'pending';
                break;
        }
    }

}
