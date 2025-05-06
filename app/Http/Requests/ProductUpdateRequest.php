<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category' => [
                'required'
            ],
            'name' => [
                'required'
            ],
            'slug' => [
                'required'
            ],
            'brand' => [
                'required'
            ],
            'color' => [
                'required'
            ],
            'small_description' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'original_price' => [
                'required'
            ],
            'selling_price' => [
                'required'
            ],
            'quantity' => [
                'required'
            ],
            'trending' => [
                'nullable'
            ],
            'status' => [
                'nullable'
            ],
            'meta_title' => [
                'required'
            ],
            'meta_keyword' => [
                'required'
            ],
            'meta_description' => [
                'required'
            ],
            'images' => [
                'nullable',
            ],
            'colors' => [
                'nullable',
            ],
            'colorquantity' => [
                'nullable'
            ]
        ];
    }
}
