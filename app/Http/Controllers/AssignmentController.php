<?php

namespace App\Http\Controllers;

use App\Services\AssignmentService;

class AssignmentController extends MainController
{
    public function __construct()
    {
        $this->service = new AssignmentService();
    }

}
