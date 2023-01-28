<?php

namespace App\Http\Requests;

use App\Enum\GenderEnum;
use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\RichText\Run;

class UserRequest extends FormRequest
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
            'address' => 'required',
            'ssn' => 'required|numeric',
            'age' => 'required',
            'gender'          => ['required', 'integer', Rule::in(GenderEnum::getKeyList())],
            'phone' => 'required|unique:users,phone|numeric',
            'email' => 'required|unique:users,email',
            'salary' => 'required|numeric',
            'status' => 'required|' . Rule::in(StatusEnum::getKeyList()),
            'password' => 'required|min:5|string|confirmed|max:100',
            'password_confirmation' => 'required|min:5|string|same:password|max:100',
            'image'          => 'required|mimes:jpg,jpeg,png,svg',
            'roles' => 'required|exists:roles,id',

        ];
    }
    public function onUpdate()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'ssn' => 'required|numeric',
            'age' => 'required',
            'gender'          => ['required', 'integer', Rule::in(GenderEnum::getKeyList())],
            'phone' => ['required',Rule::unique('users','phone')->ignore($this->route()->parameter('user')->id),'numeric'],
            'email' => ['required',Rule::unique('users','email')->ignore($this->route()->parameter('user')->id)],
            'salary' => 'required|numeric',
            'status' => 'required|' . Rule::in(StatusEnum::getKeyList()),
            'password' => 'nullable|min:5|string|confirmed|max:100',
            'password_confirmation' => 'nullable|min:5|string|same:password|max:100',
            'image'          => 'nullable|mimes:jpg,jpeg,png,svg',
            'roles' => 'required|exists:roles,id',

        ];
    }
}
