<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhToanCreateRequest extends FormRequest
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
            'tt_ten' => 'required|min:3|max:191|unique:cusc_thanhtoan',
            'tt_dienGiai' => 'required|min:3|max:191', //tên table cusc_chude
            //tên table cusc_chude
        ];
    }

    public function messages() 
    {
        return [
            'tt_ten.required' => 'Tên Thanh toán bắt buộc nhập',
            'tt_ten.min' => 'Tên Thanh toán ít nhất phải 3 ký tự trở lên',
            'tt_ten.max' => 'Tên Thanh toán tối đa chỉ 50 ký tự',
            'tt_ten.unique' => 'Tên Thanh toán này đã tồn tại. Vui lòng nhập tên Thanh toán khác',

            'tt_dienGiai.required' => 'Diễn giải bắt buộc nhập',
            'tt_dienGiai.min' => 'Diễn giải ít nhất phải 3 ký tự trở lên',
            'tt_dienGiai.max' => 'Diễn giải tối đa chỉ 50 ký tự',
        ];
    }
}
