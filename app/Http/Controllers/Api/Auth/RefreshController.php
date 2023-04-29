<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\JsonResponse;

class RefreshController extends AuthController
{
    public function __construct()
    {
        parent::__construct();
        $this();
    }
    public function __invoke(): JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
}
