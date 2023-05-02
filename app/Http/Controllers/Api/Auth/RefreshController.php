<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\JsonResponse;

final class RefreshController extends AuthController
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
