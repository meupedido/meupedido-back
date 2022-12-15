<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private $company_model;

    public function __construct (Company $company_model)
    {
        $this->company_model = $company_model;
    }

    public function login($body)
    {
        $credentials = [
            'email' => $body->email,
            'password' => $body->password
        ];

        $company = $this->company_model->where('email', $credentials['email'])->first();
        if(!$company){
            return response()->json(['error' => 'Empresa não encontrado'], 404);
        }

        if(!Hash::check($credentials['password'], $company->password)){
            return response()->json([
                'error' => 'Senha incorreta',
            ], 401);
        }

        $token = $company->createToken('token')->accessToken;

        return response()->json([
            'token' => $token,
            'company' => $company,
            'statusCode' => 200,
        ], 200);
    }

    public function getUser()
    {
        $company = auth()->guard('api')->user();

        return response()->json([
            'company' => $company,
        ], 200);
    }
}