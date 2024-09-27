<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:1', 'max:30'],
            'first_name' => ['required', 'string', 'min:3', 'max:20'],
            'last_name' => ['required', 'string', 'min:3', 'max:20'],
            'phone' => ['required', 'string', new PhoneNumberRule()],
            'city' => ['required', 'string', 'min:3', 'max:10'],
            'address' => ['required', 'string', 'min:3', 'max:50'],
        ];
    }
}
