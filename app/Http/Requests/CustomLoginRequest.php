<?php

namespace App\Http\Requests;

use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;

class CustomLoginRequest extends FortifyLoginRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|exists:users',
            'password' => 'required|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.exists' => 'کاربری با این ایمیل وجود ندارد',
            'email.required' => 'وارد کردن ایمیل الزامی است',
            'email.email' => 'لطفا یک ایمیل معتبر وارد کنید',
            'password.required' => 'وارد کردن رمز عبور الزامی است',
        ];
    }
}
