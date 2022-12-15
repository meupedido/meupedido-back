<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $auth_service;

    public function __construct(AuthService $auth_service)
    {
        $this->auth_service = $auth_service;
    }

    public function login(Request $request)
    {
        return $this->auth_service->login($request);
    }

    public function getUser()
    {
        return $this->auth_service->getUser();
    }
}
