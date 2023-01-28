<?php

namespace App\Http\Requests;

use App\Enum\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
        return [
            'first_name'=>'required|string|min:3|max:255',
            'last_name'=>'required|string|min:3|max:255',
            'email'=>'required|unique:customers,email',
            'phone'=>'required|unique:customers,phone',
            'birth_date'=>'required|date_format:Y-m-d',
            'password'          => 'required|string|min:6',
            'confirmPassword'   => 'required|string|same:password',
            'type'=>['required',Rule::in(GenderEnum::getKeyList())],
            'address'=>'required',
            'address_details'=>'required',
        ];
    }
}
