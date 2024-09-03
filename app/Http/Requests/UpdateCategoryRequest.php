<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update category');
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
                // The unique rule will now ignore the current category's ID
                Rule::unique('categories')->ignore($this->route('category')->id),
            ],
            'description' => 'sometimes|nullable|string',
            'parent_id' => 'sometimes|nullable|integer|exists:categories,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'عنوان',
            'description' => 'توضیحات',
            'parent_id' => 'دسته بندی والد',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'عنوان را وارد کنید.',
            'parent_id.required' => 'دسته بندی والد را انتخاب کنید.',
            'parent_id.exists' => 'دسته بندی والد معتبر نمی‌باشد.',
        ];
    }
}
