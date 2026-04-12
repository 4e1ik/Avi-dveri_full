{{-- $selectedLabels: массив кодов маркеров (new, sale, hit) --}}
@php
    $labels = is_array($selectedLabels ?? null) ? $selectedLabels : [];
@endphp
<div class="col-md-3 padding-0 admin-product-field-block">
    <h3>Маркер</h3>
    <label style="display: none" class="col-sm-2 control-label text-right">Checkbox</label>
    <div class="col-sm-10 padding-0">
        @foreach([
            'new' => 'Новинка',
            'sale' => 'Скидка',
            'hit' => 'Хит',
        ] as $value => $title)
            <div class="col-md-6 padding-0">
                <input type="checkbox" name="label[]" value="{{ $value }}"
                    {{ in_array($value, $labels) ? 'checked' : '' }}> {{ $title }}
            </div>
        @endforeach
    </div>
</div>
