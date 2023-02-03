<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image'          => 'required|mimes:jpg,jpeg,png|max:1000',
        ];
    }
    public function onUpdate()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image'          => 'mimes:jpg,jpeg,png|max:1000',
        ];
    }
}
