<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->guard('customer_web')->check()) {
            return redirect()->route('Frontend.Frontend.home');
        }
        return view('frontend.pages.login.index');
    }

    public function register()
    {
        return view('frontend.pages.register.index');
    }

    public function register_store(RegisterRequest $request)
    {
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->password = bcrypt($request->password);
            $customer->save();
            auth()->guard('customer_web')->login($customer);
            return redirect()->route('Frontend.Frontend.home')->with('success', __('site.register_success'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'email_phone' => 'required|string',
            'password' => 'required',
        ]);


        if (auth()->guard('customer_web')->attempt(['email' => $request->email_phone, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('Frontend.Frontend.home'))->with('success', __('site.login_success'));
        }elseif (auth()->guard('customer_web')->attempt(['phone' => $request->email_phone, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('Frontend.Frontend.home'))->with('success', __('site.login_success'));
        }else{
            return redirect()->back()->withInput($request->only('email_phone'))->with('error', __('site.login_error'));
        }

    }

    public function logout()
    {
        auth()->guard('customer_web')->logout();
        return redirect()->route('Frontend.Frontend.home');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|unique:customers,email,'.auth()->guard('customer_web')->user()->id,
            'phone'=>'required|unique:customers,phone,'.auth()->guard('customer_web')->user()->id,
            'password' => 'nullable|min:6',
            'confirmPassword' => 'required_with:password|same:password',
        ]);

        try {
            $user = auth()->guard('customer_web')->user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return redirect()->back()->with('success', __('site.update_success'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', __('site.error'));
        }
    }

}
