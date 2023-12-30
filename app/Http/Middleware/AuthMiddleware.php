<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidJwtToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('api')->user();

        if (!$user) {
            return $this->unauthorizedResponse();
        }

        return $next($request);
    }

    /**
     * Retorna uma resposta de erro não autorizada.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function unauthorizedResponse(): Response
    {
        return response()->json([
            'error' => [
                'message' => 'Unauthorized',
                'details' => [
                    'message' => 'Your access token is invalid.',
                    'status' => 403,
                ],
            ],
        ], 403);
    }
}
