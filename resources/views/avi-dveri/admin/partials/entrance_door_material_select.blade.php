@foreach(config('entrance_door_materials') as $value => $material)
    <option {{ (old('material', $selectedMaterial ?? null) === $value) ? 'selected' : '' }} value="{{ $value }}">
        {{ $material['title'] }}
    </option>
@endforeach
