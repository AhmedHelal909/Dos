<?php

namespace App\Http\Requests;

use App\Enum\GenderEnum;
use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OurTeamRequest extends FormRequest
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
            'description' => 'required',
            'image'          => 'required|mimes:jpg,jpeg,png',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'google' => 'nullable',
            'website' => 'nullable',
        ];
    }
    public function onUpdate()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'image'          => 'nullable|mimes:jpg,jpeg,png',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'google' => 'nullable',
            'website' => 'nullable',
        ];
    }
}
