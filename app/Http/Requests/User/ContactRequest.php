<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required|alpha_num|min:9|max:11',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Vui lòng nhập đúng email',
            'email.required' => 'Vui lòng nhập đúng email',
            'name.required' => 'Vui lòng nhập họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại từ 8-11 số',
            'phone.alpha_num' => 'Vui lòng nhập số điện thoại từ 8-11 số',
            'phone.min' => 'Vui lòng nhập số điện thoại từ 8-11 số',
            'phone.max' => 'Vui lòng nhập số điện thoại từ 8-11 số',
            'content.required' => 'Vui lòng nhập nội dung'
        ];
    }
}
