<?php

namespace App\Services;

use App\DTO\Manufacturer\CreateManufacturerDTO;
use App\DTO\Manufacturer\DestroyManufacturerDTO;
use App\DTO\Manufacturer\UpdateManufacturerDTO;
use App\Repositories\ManufacturerRepository;

class ManufacturerService
{
    public function __construct(
        public ManufacturerRepository $manufacturerRepository,
    ){}

    public function create(CreateManufacturerDTO $dto): string
    {
        $type = $dto->type ?? 'general';

        $this->manufacturerRepository->create(
            name:   $dto->name,
            slug:   $dto->slug,
            type:   $type,
            active: $dto->active,
        );

        return redirect(route('manufacturers', compact('type')));
    }

    public function update(UpdateManufacturerDTO $dto): string
    {
        $type = $dto->type ?? 'general';

        $this->manufacturerRepository->update(
            name:         $dto->name,
            slug:         $dto->slug,
            type:         $type,
            active:       $dto->active,
            manufacturer: $dto->manufacturer,
        );

        return redirect(route('manufacturers', compact('type')));
    }

    public function destroy(DestroyManufacturerDTO $dto): string
    {
        $type = $dto->manufacturer->type ?? 'general';
        $this->manufacturerRepository->destroy(
            manufacturer: $dto->manufacturer
        );
        return redirect(route('manufacturers', compact('type')));
    }
}