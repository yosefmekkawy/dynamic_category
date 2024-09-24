<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            $rules = [
                'name' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|numeric',
            ];

        $category = Category::with('questions')->find($this->category_id);
        foreach ($category->questions as $question) {
            if ($question->is_required) {
                $rules['questions.'.$question->id] = 'required';
            }
        }

        return $rules;

    }
}
