<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TriangleRequest extends FormRequest
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
            'number' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'Пожалуйста, введите число',
            'number.integer' => 'Число должно быть целым',
            'number.min' => 'Число должно быть положительным',
        ];
    }
}
