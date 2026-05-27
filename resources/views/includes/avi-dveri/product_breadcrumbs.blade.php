@php
    $door_materials = array_map(
        static fn (array $material): string => $material['route'],
        config('door_materials')
    );

    $door_functions = [
        'Квартира' => 'apartment_doors',
        'Улица' => 'street_doors',
        'Терморазрыв' => 'thermal_break_doors',
        ];

    $fitting_functions = [
        'Эконом' => 'economy_fittings',
        'Стандарт' => 'standard_fittings',
        'Премиум' => 'premium_fittings',
        ];
@endphp
<div class="breadcumbs pb-15">
    <ul>
        <li><a href="{{route('home')}}">Главная</a></li>
        <li><a href="{{route('catalog')}}">Каталог</a></li>
        @if($product->category == 'door')
            @if($product->door->type == 'interior')
                <li><a href="{{route('interior_doors')}}">Межкомнатные двери</a></li>
            @else
                <li><a href="{{route('entrance_doors')}}">Входные двери</a></li>
            @endif
            @if(isset($product->door))
                    <li>
                        <a href="{{route($product->door->type == 'entrance' ? $door_functions[$product->door->function] : $door_materials[$product->door->material])}}">
                            {{$product->door->type == 'entrance' ? $product->door->function: $product->door->material}}
                        </a>
                    </li>
            @endif
        @elseif($product->category == 'fitting')
            <li><a href="{{route('fittings')}}">Фурнитура</a></li>
            @if(isset($product->fitting))
                <li>
                    <a href="{{route($fitting_functions[$product->fitting->function])}}">
                        {{$product->fitting->function}}
                    </a>
                </li>
            @endif
        @endif
        <li>{{$product->title}}</li>
    </ul>
</div>