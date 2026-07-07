@if($product->images->isNotEmpty())
    @if($product->images->count() === 1)
        @php $image = $product->images[0]; @endphp
        <a style="display: flex; justify-content: center;" @include('includes.avi-dveri.product_route', ['product' => $product])>
            <img style="object-fit: contain;"
                 src="{{ asset('storage/' . $image->image) }}"
                 alt="{{ $image->description_image ?? $product->title }}"/>
        </a>
    @else
        <div class="product-card-images-slider">
            @foreach($product->images as $image)
                <div class="product-card-images-slide">
                    <a style="display: flex; justify-content: center;" @include('includes.avi-dveri.product_route', ['product' => $product])>
                        <img style="object-fit: contain;"
                             src="{{ asset('storage/' . $image->image) }}"
                             alt="{{ $image->description_image ?? $product->title }}"/>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endif
