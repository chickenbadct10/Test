<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuyenCreateRequest extends FormRequest
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
            'q_ten' => 'required|min:3|max:191|unique:cusc_quyen',
            'q_dienGiai' => 'required|min:3|max:191', //tên table cusc_chude
            //tên table cusc_chude
        ];
    }

    public function messages() 
    {
        return [
            'q_ten.required' => 'Tên Quyền bắt buộc nhập',
            'q_ten.min' => 'Tên Quyền ít nhất phải 3 ký tự trở lên',
            'q_ten.max' => 'Tên Quyền tối đa chỉ 50 ký tự',
            'q_ten.unique' => 'Tên Quyền này đã tồn tại. Vui lòng nhập tên Quyền khác',

            'q_dienGiai.required' => 'Diễn giải bắt buộc nhập',
            'q_dienGiai.min' => 'Diễn giải ít nhất phải 3 ký tự trở lên',
            'q_dienGiai.max' => 'Diễn giải tối đa chỉ 50 ký tự',
        ];
    }
}
