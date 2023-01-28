<?php

namespace App\Http\Traits;

use App\Enum\SettingEnum;
use App\Models\Models\CashBack;
use App\Models\Models\Coupon;
use App\Models\Models\Customer;
use App\Models\Models\HistoryStatus;
use App\Models\Models\Offer;
use App\Models\Models\OrderDetail;
use Carbon\Carbon;

trait StoreOrder
{


    public function storeCashBack($request, $newOrder)
    {
        if($this->checkReturner($newOrder) && $this->checkTransferDate())
        {
            CashBack::create([
                'branch_id' => $request->branch_id,
                'customer_id' => $request->customer_id,
                'order_id' => $newOrder->id,
                'cashback' => ($newOrder->actual_amount * getSettingValue(SettingEnum::getCashbackPercentage()))/100,

            ]);
            $newOrder->is_Cashback = Carbon::now();
            $newOrder->save();
        }
    }


    public function storeHistoryStatus($request, $newOrder)
    {
        HistoryStatus::create([
            'order_id' => $newOrder->id,
            'status' => $request->status,
            'vendor_id' => auth('vendor')->user() != null ? auth('vendor')->user()->id : null,
            'user_id' => auth('web')->user() != null ? auth('web')->user()->id : null,
        ]);
    }


    public function StoreOrderDetails($newOrder)
    {
        OrderDetail::create([
            'order_id' => $newOrder->id,
            'description' => $newOrder->description,
        ]);
    }

    public function couponDiscount($amount, $coupon_id = null)
    {

        if(is_null($coupon_id)){
            return $amount;
        }

        $coupon = Coupon::where('id', $coupon_id)->availableCoupon()->first();

        if ($coupon != null) {
            $amount = (1 - (($coupon->discount_percentage) / 100)) * $amount;
            $coupon->decrement_count_users = $coupon->decrement_count_users - 1;
            $coupon->save();
        }

        return $amount;
    }
    public function offerDiscount($offer_id, $amount)
    {
        if (is_null($offer_id)) {
            return 0;
        }

        $offer = Offer::where('id', $offer_id)->first();

        return (((1- $offer->discount_percentage) / 100)) * $amount;
    }
    public function checkReturner($model)
    {
       $returnPeriod = getSettingValue(SettingEnum::getReturnerPeriod());
       $created = new Carbon($model->created_at);
       $diff = $created->diff(Carbon::now())->days;
       if($diff > $returnPeriod)
       {
        return false;
       }
        return true;
    }
    public function checkTransferDate()
    {
        $date = getSettingValue(SettingEnum::getTransDate());
        $today=Carbon::now()->day;
        if($date == $today)
        {
            return true;
        }else{
            return false;
        }
    }
    public function deleteCashback($model)
    {
        CashBack::where('order_id',$model->id)->delete();
    }
    public function deleteOrderDetails($model)
    {
        OrderDetail::where('order_id',$model->id)->delete();
    }
    public function updateOrderDetails($model)
    {
        OrderDetail::where('order_id',$model->id)->update([
            'description'=>$model->description
        ]);
    }
    public function deleteHistoryStatus($model)
    {
        HistoryStatus::where('order_id',$model->id)->delete();
    }

    public function checkWallet($request)
    {
        $wallet = Customer::where('id',$request->customer_id)->pluck('wallet');
        if($wallet[0] >= $request->amount)
        {
            return true;
        }
        return false;
    }
    public function walletDiscount($request)
    {
        $customer = Customer::where('id',$request->customer_id)->first();
        $customer->wallet = $customer->wallet - $request->amount;
        $customer->save();
        

    }
}
