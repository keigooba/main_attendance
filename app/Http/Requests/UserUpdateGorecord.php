<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateGorecord extends FormRequest
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
          'name' => 'required|string|max:255',
          'date' => 'required|date|',
          'time' => 'required|date_format:H:i|',
        ];
    }

    public function attributes()
    {
        return [
            'date' => '日付',
            'time' => '出勤時間',
        ];
    }
}