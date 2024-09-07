<?php

namespace App\Http\Controllers;

use App\Services\VehicleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleController extends MainController
{
    public function __construct()
    {
        $this->service = new VehicleService();
    }

    public function available(Request $request): JsonResponse
    {
        try {
            $response = $this->service->available($request);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return $this->response($response['message'], $response['status'], $response['data']);
    }

}
