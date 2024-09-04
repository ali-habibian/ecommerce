<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|image|max:5120',
        ];
    }

    public function messages(): array{
        return [
            'image.required' => 'لطفا تصویر را انتخاب کنید',
            'image.image' => 'لطفا تصویر را انتخاب کنید',
            'image.max' => 'حجم تصویر باید کمتر از 5 مگابایت باشد',
        ];
    }
}
