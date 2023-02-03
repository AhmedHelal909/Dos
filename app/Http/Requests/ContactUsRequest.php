<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            'address' => 'nullable|string|min:3|max:255',
            'phone' => 'nullable|string|min:3|max:255',
            'email' => 'nullable|string|min:3|max:255',
            'sec_phone' => 'nullable|string|min:3|max:255',
        ];
    }
    public function onUpdate()
    {
        return [
            'address' => 'nullable|string|min:3|max:255',
            'phone' => 'nullable|string|min:3|max:255',
            'email' => 'nullable|string|min:3|max:255',
            'sec_phone' => 'nullable|string|min:3|max:255',


        ];
    }
}
