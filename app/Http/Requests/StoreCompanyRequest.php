<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'whatsapp' => ['required'],
            'payment_methods' => ['required'],
            'minimum_order' => ['required'],
            'delivery_fee' => ['required'],
            'opening_hours' => ['required'],
            'closing_hours' => ['required'],
            'street' => ['required'],
            'number' => ['required'],
            'district' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'cep' => ['required'],
        ];
    }

    public function failedValidation(Validator $validator) 
    { 

        throw new HttpResponseException(response()->json([ 
            'success' => false, 
            'message' => 'Erros de validação',
            'data' => $validator->errors() 
        ], 400)); 
    }

    public function messages()
    {
        return [
            'name.required' => 'Name é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'phone.required' => 'Telefone é obrigatório',
            'whatsapp.required' => 'Número de whatsapp é obrigatório',
            'payment_methods.required' => 'Forma de pagamento é obrigatória',
            'minimum_order.required' => 'Valor mínimo do pedido é obrigatório',
            'delivery_fee.required' => 'Taxa de entrega é obrigatória',
            'opening_hours.required' => 'Horário de abertura é obrigatório',
            'closing_hours.required' => 'Horário de fechamento é obrigatório',
            'street.required' => 'Rua é obrigatória',
            'number.required' => 'Número do estabelecimento é obrigatório',
            'district.required' => 'Bairro é obrigatório',
            'city.required' => 'Cidade é obrigatória',
            'state.required' => 'Estado é obrigatório',
            'cep.required' => 'CEP é obrigatório',
        ];
    }

}
