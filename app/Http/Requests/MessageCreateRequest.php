<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class MessageCreateRequest extends FormRequest
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
            'firstname' => ['required', 'min:3', 'max:20', 'string'],
            'lastname' => ['required', 'min:3', 'max:20', 'string'],
            'phone' => ['required', 'string', new PhoneNumberRule()],
            'email' => ['required', 'string', 'email'],
            'content' => ['required', 'string', 'min:10', 'max:1000'],
        ];
    }
}
