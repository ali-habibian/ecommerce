<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create brand');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:brands|max:255',
            'description' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Returns an array of custom attribute names for validation errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'نام برند',
            'description' => 'توضیحات برند',
        ];
    }

    /**
     * Returns an array of custom validation error messages.
     *
     * @return array<string, string> An array of validation error messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'لطفا نام برند را وارد کنید',
            'name.unique' => 'نام برند تکراری است',
            'name.max' => 'نام برند نباید بیشتر از 255 کاراکتر باشد',
            'name.string' => 'نام برند باید شامل حروف باشد',
            'description.string' => 'توضیحات برند باید شامل حروف باشد',
        ];
    }


}
