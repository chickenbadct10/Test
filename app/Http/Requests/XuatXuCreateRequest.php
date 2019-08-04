<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class XuatXuCreateRequest extends FormRequest
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
            'xx_ten' => 'required|min:3|max:191|unique:cusc_xuatxu',
            //tên table cusc_chude
        ];
    }

    public function messages() 
    {
        return [
            'xx_ten.required' => 'Tên Thanh toán bắt buộc nhập',
            'xx_ten.min' => 'Tên Thanh toán ít nhất phải 3 ký tự trở lên',
            'xx_ten.max' => 'Tên Thanh toán tối đa chỉ 50 ký tự',
            'xx_ten.unique' => 'Tên Thanh toán này đã tồn tại. Vui lòng nhập tên Thanh toán khác',
        ];
    }
}
