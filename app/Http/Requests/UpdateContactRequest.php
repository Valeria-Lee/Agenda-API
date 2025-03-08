<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        $method = $this->method();

        // Verificar el metodo HTTP: PUT o PATCH.
        if ($method == 'PUT') {
            return [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'email', 'unique:contacts,email'],
                'phone_number' => ['required', 'digits:10'],
                'notes' => ['nullable'],
            ];
        } else {
            // La regla 'sometimes' hace que si esta el valor, se valida.
            return [
                'first_name' => ['sometimes', 'required'],
                'last_name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email', 'unique:contacts,email'],
                'phone_number' => ['sometimes', 'required', 'digits:10'],
                'notes' => ['sometimes', 'nullable'],
            ];
        }
    }
}
