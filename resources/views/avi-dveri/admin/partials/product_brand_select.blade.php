{{-- Ожидает $manufactures из контроллера; для редактирования опционально $selectedManufacturerId --}}
@isset($manufactures)
    <div class="admin-product-card-field">
        <h3>Производитель</h3>
        {{-- Без вложенного .row: отрицательные margin у row ломают float соседних col-md-3 при padding-0 --}}
        <div>
            <select class="form-control" name="manufacturer" id="manufacturer">
                <option value="">— Не выбран</option>
                @foreach($manufactures->whereIn('type', [$category, 'general']) as $m)
                    <option value="{{ $m->id }}"
                        @selected((string) old('manufacturer', isset($selectedManufacturerId) ? $selectedManufacturerId : '') === (string) $m->id)
                    >{{ $m->name }}</option>
                @endforeach
            </select>
            @error('manufacturer')
                <div class="text-danger small" style="margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>
    </div>
@endisset
