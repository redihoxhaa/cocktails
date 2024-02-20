<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCocktailRequest extends FormRequest
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
            'name' => ['max:20', 'string'],
            'is_alcoholic' => ['boolean'],
            'alcohol_grade' => ['max:99'],
            'category' => ['required', Rule::in(['dolce', 'secco', 'amaro', 'aspro', 'super alcolico']),],
            'ingredients' => ['nullable', 'exists:ingredients,id'],
            'thumb' => ['nullable', 'string']
        ];
    }
}