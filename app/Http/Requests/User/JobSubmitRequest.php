<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
// use App\Http\Requests\PaginationRequest;

class JobSubmitRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|alpha_num|min:8|max:11',
            'file' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên',
            'email.required' => 'Vui lòng nhập đúng email',
            'email.email' => 'Vui lòng nhập đúng email',
            'phone.required' => 'Vui lòng nhập số điện thoại từ 8-11 số',
            'phone.alpha_num' => 'Vui lòng nhập số điện thoại từ 8-11 số',
            'phone.min' => 'Vui lòng nhập số điện thoại từ 8-11 số',
            'phone.max' => 'Vui lòng nhập số điện thoại từ 8-11 số',
            'file.required' => 'Vui lòng tải lên CV của bạn',
        ];
    }
}
