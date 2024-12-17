<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FittingRequest;
use App\Models\Fitting;
use App\Models\Image;
use App\Services\FittingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FittingController extends Controller
{
    public function __construct(private FittingService $fittingService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avi-dveri.admin.fittings.create_fitting');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FittingRequest $request)
    {
        $data = $request->all();

        $files = $request->file('image');

        $hasImage = $request->hasFile('image');

        $this->fittingService->storeFitting($data, $files, $hasImage);

        return redirect(route('admin_fittings'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fitting $fitting)
    {
        return view('avi-dveri.admin.fittings.edit_fitting', compact('fitting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FittingRequest $request, Fitting $fitting)
    {
        $data = $request->all();

//        $files = $request->file('image');
//
//        $hasImage = $request->hasFile('image');
//
//        $fittingId = $fitting->id;

        if (array_key_exists('temp_description_image', $data)){
            foreach ($data['temp_description_image'] as $key => $value) {
                $fitting->images()->where('id', $key)->update(['description_image' => $value]);
            }
        }

        $fitting->fill($data)->save();

        $data['fitting_id'] = $fitting->id;

        $i = 0;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $name = save_image($file, Image::query());
                $path = Storage::putFileAs('public/images', $file, $name); // Даем путь к этому файлу
                $data['image'] = $path;
                if (array_key_exists('temp_description_image', $data)){
                    $data['description_image'] = $data['temp_description_image'][$i];
                }
                $i++;
                $fitting->images()->create($data);
            }
        }

        $id_delete_images = explode(',', $data['delete_images']);

        foreach ($id_delete_images as $id) {
            $fitting->images()->where('id', $id)->delete();
        }

        return redirect(route('admin_fittings'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fitting $fitting)
    {
        $images = $fitting->images()->where('imageable_id', $fitting->id)->get();
        if ($images->isNotEmpty()) {
            foreach ($images as $image) {
                Storage::delete($image->image);
                $image->delete();
            }
        }
        $fitting->delete();
        return back();
    }
}
