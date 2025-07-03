<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
           "nom" => "required|string|max:255|unique:projets,nom",
           "description" => "string|nullable|max:1000",
           "date_debut" => "date|nullable",
           "date_fin" => "date|nullable",
           "rate" => "integer|nullable",
        ];
    }
}
