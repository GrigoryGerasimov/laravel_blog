<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends AuthController
{
    public function __construct()
    {
        parent::__construct();
        $this();
    }

    public function __invoke(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        $token = auth('api')->attempt($credentials);

        return $token ? $this->respondWithToken($token) : response()->json(['error' => 'Unauthorized!'], 401);
    }
}
