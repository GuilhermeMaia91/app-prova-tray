<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'price_sale' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'O campo nome é obrigatório!',
            'price_sale.required' => 'O campo email é obrigatório'
        ];
    }
}
