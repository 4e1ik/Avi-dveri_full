<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\DTO\Manufacturer\CreateManufacturerDTO;
use App\DTO\Manufacturer\DestroyManufacturerDTO;
use App\DTO\Manufacturer\UpdateManufacturerDTO;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Models\Manufacturer;
use App\Services\ManufacturerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function __construct(
        public ManufacturerService $manufacturerService
    ){}



    public function index(string $type): View|Factory|Application
    {
        $manufacturers = Manufacturer::where('type', $type)->get();
        return view('avi-dveri.admin.manufacturers.index_'.$type, compact('manufacturers','type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $type): View|Factory|Application
    {
        return view('avi-dveri.admin.manufacturers.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateManufacturerRequest $request)
    {
        $route = $this->manufacturerService->create(new CreateManufacturerDTO(
            name:   $request->input('name'),
            slug:   $request->input('slug'),
            type:   $request->input('type'),
            active: $request->input('active'),
        ));

        return $route;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manufacturer $manufacturer): View|Factory|Application
    {
        return view('avi-dveri.admin.manufacturers.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $route = $this->manufacturerService->update(new UpdateManufacturerDTO(
            name:           $request->input('name'),
            slug:           $request->input('slug'),
            type:           $request->input('type'),
            active:         $request->input('active'),
            manufacturer:   $manufacturer
        ));

        return $route;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $route = $this->manufacturerService->destroy(new DestroyManufacturerDTO(
            manufacturer: $manufacturer
        ));

        return $route;
    }
}
