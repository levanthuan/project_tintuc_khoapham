<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangkyRequest extends FormRequest
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
            'name'          => 'required|max:25|min:6',
            'email'         => 'required|unique:users,email|email',
            'password'      => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Tên không được để trống',
            'name.min'                  => 'Tên user phải lớn hơn 6 ký tự',
            'name.max'                  => 'Tên user phải nhỏ hơn 25 ký tự',
            'email.required'            => 'Hãy nhập địa chỉ email của bạn',
            'email.unique'              => 'Email của bạn đã tồn tại',
            'email.email'               => 'Email của bạn không đúng định dạng',
            'password.required'         => 'Hãy nhập password',
            'password.min'              => 'Password phải lớn hơn 6 ký tự',
            'password.max'              => 'Password phải ít hơn 32 ký tự',
            'passwordAgain.required'    => 'Hãy nhập reset password',
            'passwordAgain.same'        => 'Reset password không trùng khớp với password', 
        ];
    }
}
