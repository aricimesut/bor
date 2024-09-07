<?php

namespace App\Services;

use App\Repository\VehicleRepository;

class VehicleService extends MainService
{
    public function __construct()
    {
        $this->repository = new VehicleRepository();

        $this->rules = [
        ];
        $this->niceNames = [
        ];
    }

    public function available($request): array
    {
        return $this->repository->available($request->all());
    }
}
