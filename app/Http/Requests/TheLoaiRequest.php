<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            'Ten' => 'required|min:3|max:100',
        ];
    }

    public function messages()
    {
        return [
            'Ten.required'  => 'Bạn chưa nhập tên thể loại',
            'Ten.min'       => 'Tên thể loại quá ngắn',
            'Ten.max'       => 'Tên thể loại quá dài',            
        ];
    }
}
