@php
    $categoryLink = null;
    $categoryLabel = null;

    if ($product->category === 'door' && $product->door) {
        if ($product->door->type === 'interior') {
            $categoryLabel = 'Межкомнатные двери';
            $categoryLink = route('interior_doors');
        } elseif ($product->door->type === 'entrance') {
            $categoryLabel = 'Входные двери';
            $categoryLink = route('entrance_doors');
        }
    } elseif ($product->category === 'fitting') {
        $categoryLabel = 'Фурнитура';
        $categoryLink = route('fittings');
    }
@endphp

@if ($categoryLabel && $categoryLink)
    <div class="product-category">
        <a href="{{ $categoryLink }}" class="category-link">{{ $categoryLabel }}</a>
    </div>
@endif
