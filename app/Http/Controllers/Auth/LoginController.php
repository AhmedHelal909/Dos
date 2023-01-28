<?php

namespace App\Http\Controllers\Auth;

use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:vendor')->except('logout');
        $this->middleware('guest:delivery')->except('logout');
    }
    public function showVendorLoginForm()
    {
        return view('auth.login', ['url' => route('vendor.login-view'), 'title'=>'vendor']);
    }
    public function showDeliveryLoginForm()
    {
        return view('auth.login', ['url' => route('delivery.login-view'), 'title'=>'delivery']);
    }
    
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('web')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'status'=>StatusEnum::getAppoved(),])) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    public function vendorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('vendor')->attempt([
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'status'=>StatusEnum::getAppoved()])){
            return redirect()->intended('/vendor/home');
        }
           
        return back()->withInput($request->only('email', 'remember'));
    }
    public function deliveryLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('delivery')->attempt([
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'status'=>StatusEnum::getAppoved()])){
            return redirect()->intended('/dashboard/home');
        }
           
        return back()->withInput($request->only('email', 'remember'));
    }

    protected function authenticated(Request $request, $user)
    {
        // session()->put('branch_id',$user->branch_id);
    }
  
  
}
