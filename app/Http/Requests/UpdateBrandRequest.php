<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update brand', $this->route('brand'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands')->ignore($this->route('brand')->id),
            ],
            'description' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Returns an array of attribute names with their corresponding display names.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'عنوان',
            'description' => 'توضیحات',
        ];
    }

    /**
     * Returns an array of validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'این برند قبلا ثبت شده است.',
            'name.required' => 'لطفا عنوان برند را وارد کنید.',
            'name.max' => 'عنوان برند نمی تواند بیشتر از 255 کاراکتر باشد.',
            'description.max' => 'توضیحات برند نمی تواند بیشتر از 255 کاراکتر باشد.',
        ];
    }
}
