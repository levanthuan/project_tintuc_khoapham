<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TintucRequest extends FormRequest
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
            'LoaiTin'       => 'required',
            'TieuDe'        => 'required|unique:TinTuc,TieuDe|min:3',
            'TheLoai'       => 'required',
            'TomTat'        => 'required',
            'NoiDung'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'LoaiTin.required'  => 'Bạn chưa chọn loại tin',
            'TieuDe.required'   => 'Bạn chưa nhập tiêu đề',
            'TieuDe.min'        => 'Tiêu đề phải có ít nhất 3 ký tự',
            'TieuDe.unique'     => 'Tiêu đề đã tồn tại',
            'TomTat.required'   => 'Hãy nhập tóm tắt',
            'NoiDung.required'  => 'Hãy nhập nội dung tin tức',            
        ];
    }
}
