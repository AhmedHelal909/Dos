<?php

namespace App\Http\Controllers\Auth;

use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Models\Delivery;
use App\Models\Models\Vendor;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:vendor');
        $this->middleware('guest:delivery');
    }
    public function showVendorRegisterForm()
    {
        return view('auth.register', ['route' => route('admin.register-view'), 'title'=>'Admin']);
    }
    protected function createVendor(array $data)
    {
        $admin = Vendor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status'=>StatusEnum::getPending(),
            'branch_id'=>[null]
        ]);
    }
    protected function createDelivery(array $data)
    {
        $admin = Delivery::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status'=>StatusEnum::getPending(),
            'branch_id'=>[null]
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
 
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        if($request->type == 'vendor'){

            $user = $this->createVendor($request->all());
            event(new Registered($user));
            $login = new LoginController();
            // $login->vendorLogin($request);
        }else if($request->type == 'delivery') {
            $user = $this->createDelivery($request->all());
            event(new Registered($user));
            $login = new LoginController();
        
        } else  {
        event(new Registered($user = $this->create($request->all())));
        
        // $this->guard()->login($user);
        }

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
 
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status'=>StatusEnum::getPending(),
            'branch_id'=>[null]
        ]);
    }
}