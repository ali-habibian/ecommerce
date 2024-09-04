<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create products');
    }

    /**
     * Prepare input for validation
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        if ($this->input('discounted_price') === null) {
            $this->merge(['discounted_price' => $this->input('price')]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|int|min:1',
            'category_id' => 'required|int|exists:categories,id',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'status' => 'required|string|in:active,draft,review',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'نام اجباری است.',
            'name.string' => 'نام باید یک رشته باشد.',
            'name.max' => 'نام نمی تواند بیشتر از 255 کاراکتر باشد.',
            'description.required' => 'توضیحات اجباری است.',
            'description.string' => 'توضیحات باید یک رشته باشد.',
            'quantity.required' => 'تعداد اجباری است.',
            'quantity.int' => 'تعداد باید یک عدد صحیح باشد.',
            'quantity.min' => 'تعداد باید حداقل 1 باشد.',
            'category_id.required' => 'دسته‌بندی اجباری است.',
            'category_id.int' => 'دسته‌بندی باید یک عدد صحیح باشد.',
            'category_id.exists' => 'دسته‌بندی نامعتبر است.',
            'price.required' => 'قیمت اجباری است.',
            'price.numeric' => 'قیمت باید یک عدد باشد.',
            'discounted_price.numeric' => 'تخفیف‌ باید یک عدد باشد.',
            'status.required' => 'وضعیت اجباری است.',
            'status.string' => 'وضعیت باید یک رشته باشد.',
            'status.in' => 'وضعیت باید یکی از active, draft, review باشد.',
            'image.required' => 'تصویر اجباری است.',
            'image.image' => 'تصویر باید یک فایل تصویری باشد.',
            'image.mimes' => 'تصویر باید یکی از jpeg, png, jpg, gif باشد.',
            'image.max' => 'حجم تصویر نمی تواند بیشتر از 2048 کیلوبایت باشد.',
        ];
    }
}
