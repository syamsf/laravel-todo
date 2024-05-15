<?php

namespace App\Http\Requests\ToDo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreationRequest extends FormRequest
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
            "user_id"  => ["required", "int", Rule::exists("users", "id")],
            "activity" => ["required", "string"],
            "priority" => ["required", "numeric", "min:1"],
        ];
    }
}
