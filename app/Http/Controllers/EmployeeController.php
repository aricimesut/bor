<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;

class EmployeeController extends MainController
{
    public function __construct()
    {
        $this->service = new EmployeeService();
    }

}
