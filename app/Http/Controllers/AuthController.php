<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends MainController
{
    public function __construct()
    {
        $this->service = new AuthService();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        try {
            $response = $this->service->login($request);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return $this->response($response['message'], $response['status'], $response['data']);
    }
}
