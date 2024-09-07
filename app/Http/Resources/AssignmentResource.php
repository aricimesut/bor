<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "employee" => $this->employee->name,
            "employee_id" => $this->employee_id,
            "plate" => $this->vehicle->plate,
            "vehicle_id" => $this->vehicle_id,
            "assigned_at" => date("d/m/Y", strtotime($this->created_at))
        ];
    }
}
