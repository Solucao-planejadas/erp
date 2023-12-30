<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function __construct(
        protected AuthService $authService
    )
    {}

    public function register(): JsonResponse
    {
        return $this->authService->register();
    }

    public function me(): JsonResponse
    {
        return $this->authService->me();
    }

    public function login(): JsonResponse
    {
        return $this->authService->login();
    }

    public function logout(): JsonResponse
    {
        return $this->authService->logout();
    }


    public function refresh(): JsonResponse
    {
        return $this->authService->refresh();
    }

}
