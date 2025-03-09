<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReminderRequest extends FormRequest
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

        if ($method == 'PUT') {
            return [
                'user_id' => ['required|exists:users,id'],
                'name' => ['required'],
                'description' => ['required'],
                'date' => ['required', 'date'],
            ];
        } else {
            return [
                'user_id' => ['sometimes','required','exists:users,id'],
                'name' => ['sometimes','required'],
                'description' => ['sometimes','required'],
                'date' => ['sometimes','required', 'date'],
            ];
        }
    }
}
