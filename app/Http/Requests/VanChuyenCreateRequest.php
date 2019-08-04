<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VanChuyenCreateRequest extends FormRequest
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
            'vc_ten' => 'required|min:3|max:191|unique:cusc_vanchuyen',
            'vc_chiPhi' => 'required|min:3|max:191', //tên table cusc_chude
            'vc_dienGiai' => 'required|min:3|max:191', //tên table cusc_chude
            //tên table cusc_chude
        ];
    }

    public function messages() 
    {
        return [
            'vc_ten.required' => 'Tên Thanh toán bắt buộc nhập',
            'vc_ten.min' => 'Tên Thanh toán ít nhất phải 3 ký tự trở lên',
            'vc_ten.max' => 'Tên Thanh toán tối đa chỉ 50 ký tự',
            'vc_ten.unique' => 'Tên Thanh toán này đã tồn tại. Vui lòng nhập tên Thanh toán khác',

            'vc_chiPhi.required' => 'Diễn giải bắt buộc nhập',
            'vc_chiPhi.min' => 'Diễn giải ít nhất phải 3 ký tự trở lên',
            'vc_chiPhi.max' => 'Diễn giải tối đa chỉ 50 ký tự',

            'vc_dienGiai.required' => 'Diễn giải bắt buộc nhập',
            'vc_dienGiai.min' => 'Diễn giải ít nhất phải 3 ký tự trở lên',
            'vc_dienGiai.max' => 'Diễn giải tối đa chỉ 50 ký tự',
        ];
    }
}
