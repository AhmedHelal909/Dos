<?php

namespace App\Http\Requests;

use App\Enum\GenderEnum;
use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PharmacyRequest extends FormRequest
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
//            'address' => 'required',
            'phone' => 'required|unique:pharmacies,phone|numeric',
            'email' => 'required|unique:pharmacies,email',
            'password' => 'required|min:5|string|confirmed|max:100',
            'password_confirmation' => 'required|min:5|string|same:password|max:100',
            'image'          => 'mimes:jpg,jpeg,png,svg',
//            'roles' => 'required|exists:roles,id',
        ];
    }
    public function onUpdate()
    {
        return [
            'name' => 'required',
//            'address' => 'required',
            'phone' => ['required',Rule::unique('pharmacies','phone')->ignore($this->route()->parameter('pharmacy')->id),'numeric'],
            'email' => ['required',Rule::unique('users','email')->ignore($this->route()->parameter('pharmacy')->id)],
            'password' => 'nullable|min:5|string|confirmed|max:100',
            'password_confirmation' => 'nullable|min:5|string|same:password|max:100',
            'image'          => 'mimes:jpg,jpeg,png,svg',
        ];
    }
}
