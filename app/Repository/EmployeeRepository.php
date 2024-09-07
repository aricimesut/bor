<?php

namespace App\Repository;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;

class EmployeeRepository extends MainRepository
{
    public function __construct()
    {
        $this->model = new Employee();

        $this->resource = EmployeeResource::class;

        $this->searchable = ["name"];
    }
}
