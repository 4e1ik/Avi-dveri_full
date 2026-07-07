@if($product->label !== null)
    @php
        $labels = collect($product->label);
        $sortedLabels = $labels->filter(static fn ($item) => $item === 'native')
            ->concat($labels->filter(static fn ($item) => $item !== 'native'));
    @endphp
    <div class="lables">
        @foreach($sortedLabels as $item)
            @if ($item === 'native')
                <span class="pro-label-native" aria-label="На родныя тавары">
                    <span class="pro-label-native__track">
                        <span class="pro-label-native__pill">4%</span>
                        <span class="pro-label-native__expand">На родныя тавары</span>
                    </span>
                </span>
            @else
                <span class="pro-label {{$item == 'new'?('new-label'):($item == 'sale'?('sale-label'):($item == 'order'?('order-label'):('hit-label')))}}">{{$item == 'new'?('Новинка'):($item == 'sale'?('Скидка'):($item == 'order'?('На заказ'):('Хит')))}}</span>
            @endif
        @endforeach
    </div>
@endif
