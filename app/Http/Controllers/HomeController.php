<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Installment;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth('pharmacy')->user() != null){
            $ids = auth('pharmacy')->user()->id;
            $ids = json_encode($ids);
            $orders = Order::whereJsonContains('pharmacy_ids', $ids)->orderBy('id', 'desc')->take(5)->get();
        }else{
            $orders = Order::latest()->take(5)->get();
        }

        return view('dashboard.home', compact('orders'));
    }
}
