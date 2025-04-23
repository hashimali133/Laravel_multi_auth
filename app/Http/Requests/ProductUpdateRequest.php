<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'book_title' => [
                'required',
                Rule::unique('products', 'book_title')->ignore($this->product->id),
            ],
            'author' => 'required|string',
            'genre' => 'required|string',
            'published_date' => 'required|date',
            'status' => 'required|string',
        ];
    }
}
