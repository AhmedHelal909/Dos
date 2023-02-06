<?php

namespace App\Http\Requests;

use App\Enum\GenderEnum;
use App\Enum\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OurHistoryRequest extends FormRequest
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
            'content' => 'required',
            'date' => 'required',
        ];
    }
    public function onUpdate()
    {
        return [
            'content' => 'required',
            'date' => 'required',
        ];
    }
}
