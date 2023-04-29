<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\JsonResponse;

class LogoutController extends AuthController
{
    public function __construct()
    {
        parent::__construct();
        $this();
    }
    public function __invoke(): JsonResponse
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
