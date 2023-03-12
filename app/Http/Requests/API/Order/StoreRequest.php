<?php

namespace App\Http\Requests\API\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'products' => 'required|array',
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'total_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}
