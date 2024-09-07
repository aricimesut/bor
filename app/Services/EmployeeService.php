<?php

namespace App\Services;

use App\Repository\EmployeeRepository;

class EmployeeService extends MainService
{
    public function __construct()
    {
        $this->repository = new EmployeeRepository();

        $this->rules = [
        ];
        $this->niceNames = [
        ];
    }
}
