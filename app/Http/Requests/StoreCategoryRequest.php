<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create category');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:categories|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'sometimes|nullable|integer|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public
    function messages(): array
    {
        return [
            'name.required' => 'نام دسته بندی الزامی است.',
            'name.string' => 'نام دسته بندی باید یک رشته باشد.',
            'name.unique' => 'نام دسته بندی تکراری است.',
            'name.max' => 'نام دسته بندی حداکثر 255 کاراکتر می تواند باشد.',

            'description.string' => 'توضیحات باید یک رشته باشد.',

            'parent_id.integer' => 'شناسه والد باید یک عدد صحیح باشد.',
            'parent_id.exists' => 'شناسه والد معتبر نیست.',

            'image.required' => 'تصویر الزامی است.',
            'image.image' => 'فایل انتخاب شده باید یک تصویر باشد.',
            'image.mimes' => 'فایل انتخاب شده باید با فرمت های jpeg, png, jpg, gif باشد.',
            'image.max' => 'اندازه فایل انتخاب شده حداکثر 2048 کیلوبایت می تواند باشد.',
        ];
    }
}
