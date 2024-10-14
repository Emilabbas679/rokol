<?php

namespace App\Http\Requests;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CartCompleteRequest extends
    FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth( 'web' )->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'select_address' => [ 'required', 'string' ],
            'address_id'     => [
                Rule::requiredIf( $this->input( 'select_address' ) == 'address' ),
                'string',
                'numeric',
                Rule::exists( Address::class, 'id' )->where( 'user_id', fUserId() )
            ]
        ];
    }
}
