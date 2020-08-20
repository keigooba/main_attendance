<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateRecord extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date|after_or_equal:today',
        ];
    }

    public function attributes()
    {
        return [
            'date' => '日付',
        ];
    }

    public function messages()
    {
        return [
            'date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}