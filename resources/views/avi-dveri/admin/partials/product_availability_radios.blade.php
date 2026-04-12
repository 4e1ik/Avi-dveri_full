@php
    if (old('availability') !== null) {
        $inStock = (string) old('availability') === '1';
    } else {
        $inStock = isset($product) ? (bool) $product->availability : true;
    }
@endphp
<div class="col-md-3 padding-0 admin-product-field-block">
    <h3>Наличие</h3>
    <div class="admin-availability-radios">
        <label class="admin-availability-label">
            <input type="radio" name="availability" value="1" @checked($inStock)>
            <span>В наличии</span>
        </label>
        <label class="admin-availability-label">
            <input type="radio" name="availability" value="0" @checked(!$inStock)>
            <span>Нет в наличии</span>
        </label>
    </div>
    @error('availability')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
