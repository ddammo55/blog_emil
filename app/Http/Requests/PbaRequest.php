<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PbaRequest extends FormRequest
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
            // 'title' => 'required',
            // 'files' => ['array'],
            // 'files.*' => ['mimes:jpg,png,zip,tar', 'max:30000'],
        ];
    }

    public function messages()
    {
        return [
            // 'title.required' => '필수 입력 항목입니다.',
            // ' files.type' => '확장자',
        ];
    }
}
