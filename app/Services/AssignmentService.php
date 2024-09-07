<?php

namespace App\Services;

use App\Repository\AssignmentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AssignmentService extends MainService
{
    public function __construct()
    {
        $this->repository = new AssignmentRepository();

        $this->rules = [
            "employee_id" => "required|exists:employees,id",
            "vehicle_id" => "required", "exists:vehicles,id"
        ];

        $this->niceNames = [
            "employee_id" => "Employee",
            "vehicle_id" => "Vehicle"
        ];
    }
}
