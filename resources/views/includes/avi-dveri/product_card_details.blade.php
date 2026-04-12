<ul>
    <li>
        <span class="{{ $product->availability ? 'product-availability--in-stock' : 'product-availability--on-order' }}">{{ $product->availability ? 'В наличии' : 'Под заказ' }}</span>
    </li>
    @if($product->manufacturer)
        <li>Производитель: {{ $product->manufacturer->name }}</li>
    @endif
    @if(isset($product->door->material))
        <li>Материал: {{ $product->door->material }}</li>
    @endif
    @if(isset($product->door->glass))
        <li>Стекло: {{ $product->door->glass }}</li>
    @endif
</ul>
