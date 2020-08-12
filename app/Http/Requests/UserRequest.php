<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'full_name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'avatar' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Không được để trống',
            'gender.required' => 'Không được để trống',
            'address.required' => 'Không được để trống',
            'phone_number.required' => 'Không được để trống',
            'phone_number.numeric' => 'Yêu cầu nhập số',
            'avatar.image' => 'Phải là hình ảnh'
        ];
    }
}
