<?php

namespace App\Repository;

use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AssignmentRepository extends MainRepository
{
    public function __construct()
    {
        $this->model = new Assignment();

        $this->resource = AssignmentResource::class;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data): array
    {
        $isAssigned = $this->isAssigned($data["vehicle_id"]);

        if ($isAssigned) {
            throw new BadRequestException("Vehicle is not available");
        }

        $record = $this->model->create($data);

        return [
            'message' => 'Record created successfully',
            'status' => 200,
            'data' => json_encode(new $this->resource($record))
        ];
    }

    /**
     * @param $vehicleId
     * @return bool
     */
    public function isAssigned($vehicleId): bool
    {
        return $this->model->where('vehicle_id', $vehicleId)
            ->exists();

    }

    public function update(int $id, array $data): array
    {
        $model = $this->model->find($id);

        if (!$model) {
            return [
                'message' => 'Record not found',
                'status' => 404,
                'data' => null
            ];
        }

        //check if vehicle is available
        $checkAvailability = $this->checkAvailability($id, $data["vehicle_id"]);

        if ($checkAvailability) {
            throw new BadRequestException("Vehicle is not available");
        }

        $model->update($data);

        return [
            'message' => 'Record updated successfully',
            'status' => 200,
            'data' => json_encode(new $this->resource($model))
        ];
    }

    /**
     * @param $assignmentId
     * @param $vehicleId
     * @return bool
     */
    public function checkAvailability($assignmentId, $vehicleId): bool
    {
        return $this->model->where('vehicle_id', $vehicleId)
            ->where("id", "!=", $assignmentId)
            ->exists();
    }
}
