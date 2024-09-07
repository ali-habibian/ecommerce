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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'وارد کردن عنوان دسته بندی الزامی است.',
            'name.string' => 'عنوان دسته بندی باید یک رشته باشد.',
            'name.max' => 'طول عنوان دسته بندی نباید بیشتر از 255 کاراکتر باشد.',
            'name.unique' => 'عنوان دسته بندی تکراری است.',

            'description.string' => 'توضیحات دسته بندی باید یک رشته باشد.',

            'parent_id.integer' => 'دسته بندی والد باید یک عدد صحیح باشد.',
            'parent_id.exists' => 'دسته بندی والد وارد شده معتبر نیست.',

            'image.image' => 'تصویر وارد شده معتبر نیست.',
            'image.mimes' => 'نوع فایل تصویر وارد شده معتبر نیست.',
            'image.max' => 'سایز تصویر وارد شده نباید بیشتر از 2048 کیلو بایت باشد.',
        ];
    }
}
