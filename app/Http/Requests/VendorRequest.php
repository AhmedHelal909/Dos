<?php

namespace App\Http\Requests;

use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorRequest extends FormRequest
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
            'phone' => 'required|unique:vendors,phone|numeric',
            'email' => 'required|unique:vendors,email',
            'description' => 'nullable',
            'password' => 'required|min:5|string|confirmed|max:100',
            'password_confirmation' => 'required|min:5|string|same:password|max:100',
         
            'image'          => 'required|mimes:jpg,jpeg,png,svg',
            'note' => 'nullable',
            'status' => 'required|' . Rule::in(StatusEnum::getKeyList()),
            'roles' => 'required|exists:roles,id',

        ];
    }
    public function onUpdate()
    {
        return [
            'name' => 'required',
            'phone' => ['required',Rule::unique('vendors','phone')->ignore($this->route()->parameter('vendor')->id) ,'numeric' ],
            'email' => ['required',Rule::unique('vendors','email')->ignore($this->route()->parameter('vendor')->id) ],
            'description' => 'nullable',
            'password' => 'nullable|min:5|string|confirmed|max:100',
            'password_confirmation' => 'nullable|min:5|string|same:password|max:100',
         
            'image'          => 'nullable|mimes:jpg,jpeg,png,svg',
            'note' => 'nullable',
            'status' => 'required|' . Rule::in(StatusEnum::getKeyList()),
            'roles' => 'required|exists:roles,id',

        ];
    }
}
