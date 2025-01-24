<?php

namespace App\Http\Requests;

use App\Models\Color;
use App\Models\Product;
use App\Models\Weight;
use App\Nova\ProductPrice;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CartAddProductRequest extends FormRequest
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
            'product_id' => [ 'required', 'string', Rule::exists( Product::class, 'id' ) ],
            'color_id'   => [
                Rule::requiredIf( function () {
                    $product = Product::query()
                                      ->with( 'colorGroups' )
                                      ->where( 'id', $this->input( 'product_id' ) )
                                      ->first();
                    return $product->colorGroups->count();
                } ), 'string', Rule::exists( Color::class, 'id' )
            ],
            'weight_id'  => [ 'required', 'numeric', 'string', Rule::exists( Weight::class, 'id' ) ],
            'count'      => [ 'required', 'string', 'numeric', 'min:1' ]
        ];
    }
}
