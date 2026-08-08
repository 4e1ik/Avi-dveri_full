@php
    $isEntrance = ($type ?? ($product->door->type ?? null)) === 'entrance';

    if (old('mirror') !== null) {
        $mirrorChecked = (string) old('mirror') === '1';
    } else {
        $mirrorChecked = isset($product) ? (bool) $product->door->mirror : false;
    }

    if (old('sound_insulation') !== null) {
        $soundChecked = (string) old('sound_insulation') === '1';
    } else {
        $soundChecked = isset($product)
            ? (bool) $product->door->sound_insulation
            : true;
    }
@endphp
<div class="col-md-3 padding-0 admin-product-field-block">
    <h3>Параметры двери</h3>
    <div class="admin-availability-radios">
        @if ($isEntrance)
            <label class="admin-availability-label">
                <input type="hidden" name="sound_insulation" value="0">
                <input type="checkbox" name="sound_insulation" value="1" @checked($soundChecked)>
                <span>С шумоизоляцией</span>
            </label>
        @endif
        <label class="admin-availability-label">
            <input type="hidden" name="mirror" value="0">
            <input type="checkbox" name="mirror" value="1" @checked($mirrorChecked)>
            <span>С зеркалом</span>
        </label>
    </div>
</div>
