<?php

namespace App\Http\Controllers\Api;

use App\Enum\GenderEnum;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
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

        return $this->apiResponse(new CustomerResource($customer));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
            'email'=>['required',Rule::unique('customers','email')->ignore(auth('customer')->user()->id)],
            'phone'=>['required',Rule::unique('customers','phone')->ignore(auth('customer')->user()->id)],
            'password'          => 'required|string|min:6',
            'confirmPassword'   => 'required|string|same:password',
            'address'=>'nullable',
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
        return $this->apiResponse(new CustomerResource($customer));
    }


}

