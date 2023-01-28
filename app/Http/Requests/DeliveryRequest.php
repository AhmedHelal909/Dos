<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ? $this->onUpdate() : $this->onCreate();
    }
    public function onCreate()
    {
        return [
            'name' => 'required',
            'motor_number' => 'required',
            'license' => 'required',
            'ssn' => 'required|numeric',
            'email' => 'required|unique:deliveries,email',
            'password' => 'required|min:5|string|confirmed|max:100',
            'password_confirmation' => 'required|min:5|string|same:password|max:100',
            'branch_id' => 'required|array',
            'image'          => 'required|mimes:jpg,jpeg,png,svg',
     

        ];
    }
    public function onUpdate()
    {
        return [
            'name' => 'required',
            'motor_number' => 'required',
            'license' => 'required',
            'ssn' => 'required|numeric',
            'email' => ['required',Rule::unique('deliveries','email')->ignore($this->route()->parameter('delivery')->id)],
            'password' => 'nullable|min:5|string|confirmed|max:100',
            'password_confirmation' => 'nullable|min:5|string|same:password|max:100',
            'branch_id' => 'required|array',
            'image'          => 'nullable|mimes:jpg,jpeg,png,svg',

        ];
    }

}
