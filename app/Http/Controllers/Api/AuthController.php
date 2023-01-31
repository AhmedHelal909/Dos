<?php
namespace App\Http\Controllers\Api;

use App\CustomClass\response;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\CustomerResourse;
use App\Models\Customer;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;

    }

    public function register(RegisterRequest $request)
    {
        $request_data = $request->except(['confirmPassword', 'password']);
        $request_data['password'] = bcrypt($request->get('password'));
        $customer = $this->customer->create($request_data);
        $token= JWTAuth::fromUser($customer);
        return response()->json([
            "status" => true,
            'message'=> 'register success',
            'customer'   =>$customer,
            'token'  => $token,
        ], 200);

    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_phone' => 'required|string',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response::falid($validator->errors(), 422);
        }

        $credentials = $this->credentials($request);

        try {
            if (!$token = auth('customer')->attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'message' => 'passwored or email is wrong',
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => false,
                'message' => 'some thing is wrong',
            ], 401);
        }
        return response()->json([
            'status'  => true,
            'message' => 'succeess',
            'customer'=> auth('customer')->user(),
            'token' => $token,
        ], 200);

    }
    public function credentials($request)
    {
        if ($this->customer->where('email' , $request->email_phone)->first()) {
            return  ['email' => $request->email_phone, 'password' => $request->password];

        } else if ($this->customer->where('phone' , $request->email_phone)->first()) {

            return  ['phone' => $request->email_phone, 'password' => $request->password];
        } else {
            return  ['email' => $request->email_phone, 'password' => $request->password];
        }
    }
    public function logout(Request $request)
    {
        try {
            Auth::guard('customer')->logout();
            return response::suceess('logout success', 200);
        } catch (\Exception $e) {
            return $this->errorResponse(__('site.error_subscription'));
        }

    }
    public function forgetPassword(Request $request)
    {
        // $token = Str::random(4);
        $token = '1234';
        $customer = $this->customer
            ->where('email', $request->email_phone)
            ->orWhere('phone', $request->email_phone)->first();
        if (empty($customer)) {
            return response()->json([
                'status' => false,
                'message' => 'Please Verify Your Account First',
            ]);
        }
        DB::table('password_resets')->where('email', $request->email_phone)->delete();
        $row = DB::table('password_resets')->where('email', $request->email_phone)
            ->insert([
                'email' => $request->email_phone,
                'token' => $token,
            ]);
        return $this->apiResponse(__('site.add_successfuly'));

    }
    public function verifiedToken(Request $request)
    {
        $token = PasswordReset::
            where('token', $request->token)
            ->where('verified', false)
            ->first();
        if ($token) {
            $token->update([
                'verified' => true,
            ]);
            $token->save();
            return response()->json([
                'status' => true,
                'message' => 'verified succefully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Please Write the right code',
            ]);
        }
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|exists:password_resets,token',
            'password' => 'required | min:6| confirmed',
            'password_confirmation' => "same:password",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->tojson(),
            ]);
        }
        $tokenRow = PasswordReset::where('token', $request->token)
            ->where('verified', true)->first();
        if (empty($tokenRow)) {
            return response()->json([
                'status' => false,
                'message' => 'Please Write The Right Code',
            ]);
        }
        $customer = $this->customer->where('email', $tokenRow->email)
            ->orWhere('phone', $tokenRow->email)->first();
        if (empty($customer)) {
            return response()->json([
                'status' => false,
                'message' => 'Please Write The Right Code',
            ]);
        }
        $customer->update([
            'password' => bcrypt($request->password),
        ]);
        $tokenRow->delete();
        return response()->json([
            'status' => true,
            'message' => 'Your Password Reset Successfully',
        ]);
    }
    public function showProfile()
    {
        return $this->apiResponse(new CustomerResourse(auth('customer')->user()));
    }
}
