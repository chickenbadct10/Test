<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiCreateRequest  extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Tạm thời không phân quyền
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'l_ten' => 'required|min:3|max:191|unique:cusc_loai', //tên table cusc_chude
        ];
    }

    public function messages() 
    {
        return [
            'l_ten.required' => 'Tên Loại bắt buộc nhập',
            'l_ten.min' => 'Tên Loại ít nhất phải 3 ký tự trở lên',
            'l_ten.max' => 'Tên Loại tối đa chỉ 50 ký tự',
            'l_ten.unique' => 'Tên Loại này đã tồn tại. Vui lòng nhập tên Loại khác'
        ];
    }
}
