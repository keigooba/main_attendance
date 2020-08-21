<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateLeaverecord extends FormRequest
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
          'date' => 'required|date|after_or_equal:today',
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

    public function messages()
    {
        return [
            'date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
