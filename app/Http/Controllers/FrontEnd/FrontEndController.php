<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enum\SettingEnum;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OurHistory;
use App\Models\OurTeam;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class FrontEndController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        $our_team = OurTeam::get();
        return view('frontend.pages.home.index', compact('sliders', 'our_team'));
    }

    public function about()
    {
        $histories = OurHistory::get();
        return view('frontend.pages.about.index', compact('histories'));
    }

    public function contact()
    {
        return view('frontend.pages.contact.index');
    }

    public function account()
    {
        $orders = Order::where('customer_id', auth('customer_web')->user()->id)->get();
        return view('frontend.pages.account.index', compact('orders'));
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        try {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return redirect()->back()->with('success', __('site.Your message has been sent successfully'));
        }catch (\Exception $e){
            toastr()->error(__('site.error'));
            return redirect()->back();
        }

    }
}
