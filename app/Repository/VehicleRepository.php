<?php

namespace App\Repository;

use App\Http\Resources\PaginateCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;

class VehicleRepository extends MainRepository
{
    public function __construct()
    {
        $this->model = new Vehicle();

        $this->resource = VehicleResource::class;

        $this->searchable = ["plate"];
    }

    /**
     * @param $data
     * @return array
     */
    public function available($data): array
    {
        $records = $this->model->whereDoesntHave('assignments')
            ->paginate($data['per_page'] ?? 10);

        return [
            'message' => 'Records found',
            'status' => 200,
            'data' => json_encode(new PaginateCollection($records, $this->resource))
        ];
    }
}
