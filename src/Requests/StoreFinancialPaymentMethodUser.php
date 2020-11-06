<?php

namespace ConfrariaWeb\Financial\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancialPaymentMethodUser extends FormRequest
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
            'holder' => 'required|max:255',
            'card-number' => 'required|max:16|min:16',
            'expiration-date' => 'date_format:"m/Y"|required|max:7|min:7',
            'security-code' => 'required|max:3|min:3',
        ];
    }
}
