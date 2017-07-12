<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangnhapRequest extends FormRequest
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
            'email'          => 'required|email',
            'password'      => 'required|min:6|max:32',
        ];
    }

    public function messages()
    {
        return [
            'email.required'             => 'Tên không được để trống',
            'email.email'               => 'Email bạn nhập không đúng định dạng',
            'password.required'         => 'Hãy nhập password',
            'password.min'              => 'Password phải lớn hơn 6 ký tự',
            'password.max'              => 'Password phải ít hơn 32 ký tự', 
        ];
    }
}
