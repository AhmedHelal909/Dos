<?php

namespace App\Http\Controllers\Api;

use App\Enum\GenderEnum;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\CustomerResourse;
use App\Models\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;

    }
    public function index(Request $request)
    {
        $customer = auth('customer')->user();
        return $this->apiResponse(new CustomerResourse($customer));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=>'required|string|min:3|max:255',
            'last_name'=>'required|string|min:3|max:255',
            'email'=>['required',Rule::unique('customers','email')->ignore(auth('customer')->user()->id)],
            'phone'=>['required',Rule::unique('customers','phone')->ignore(auth('customer')->user()->id)],
            'birth_date'=>'required|date_format:Y-m-d',
            'password'          => 'required|string|min:6',
            'confirmPassword'   => 'required|string|same:password',
            'type'=>['required',Rule::in(GenderEnum::getKeyList())],
            'address'=>'required',
            'address_details'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->tojson(),
            ]);
        }
        $request_data = $request->except(['confirmPassword', 'password']);
        $customer = $this->customer->find(auth('customer')->user()->id);
        $request_data['password'] = bcrypt($request->get('password'));
        $customer->update($request_data);
        return $this->apiResponse(new CustomerResourse($customer));
    }


}

