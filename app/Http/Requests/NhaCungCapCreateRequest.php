<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCungCapCreateRequest extends FormRequest
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
            'ncc_ten' => 'required|min:3|max:50|unique:cusc_nhacungcap',
            'ncc_daiDien' => 'required|min:3|max:50', //tên table cusc_chude
            'xx_ma' => 'required', //tên table cusc_chude
            //tên table cusc_chude
        ];
    }

    public function messages() 
    {
        return [
            'ncc_ten.required' => 'Tên Nhà cung cấp bắt buộc nhập',
            'ncc_ten.min' => 'Tên Nhà cung cấp ít nhất phải 3 ký tự trở lên',
            'ncc_ten.max' => 'Tên Nhà cung cấp tối đa chỉ 50 ký tự',
            'ncc_ten.unique' => 'Tên Nhà cung cấp này đã tồn tại. Vui lòng nhập tên Nhà cung cấp khác',

            'ncc_daiDien.required' => 'Người đại diện bắt buộc nhập',
            'ncc_daiDien.min' => 'Người đại diện ít nhất phải 3 ký tự trở lên',
            'ncc_daiDien.max' => 'Người đại diện tối đa chỉ 50 ký tự',

            'xx_ma.required' => 'Xuất xứ bắt buộc nhập',
        ];
    }
}
