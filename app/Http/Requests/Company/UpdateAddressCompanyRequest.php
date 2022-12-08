<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAddressCompanyRequest extends FormRequest
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
            'street.required' => 'Rua é obrigatória',
            'number.required' => 'Número do estabelecimento é obrigatório',
            'district.required' => 'Bairro é obrigatório',
            'city.required' => 'Cidade é obrigatória',
            'state.required' => 'Estado é obrigatório',
            'cep.required' => 'CEP é obrigatório',
        ];
    }
}
