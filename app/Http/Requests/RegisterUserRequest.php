<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends
    FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->ajax();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => [ 'required', 'string', 'max:255' ],
            'email'     => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
            'phone'     => [ 'required', 'string', 'max:20', 'unique:users', new PhoneNumberRule() ],
            'password'  => [ 'required', 'string', 'min:8', 'confirmed' ],
        ];
    }
}
