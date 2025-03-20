@php
$entrance_doors = [
    'Улица' => 'street_doors',
    'Квартира' => 'apartment_doors',
    'Терморазрыв' => 'thermal_break_doors',
    ];
$interior_doors_routes = [
    'Экошпон' => 'eco_veneer_doors',
    'Полипропилен' => 'polypropylene_doors',
    'Эмаль' => 'enamel_doors',
    'Скрытые' => 'hidden_doors',
    'Массив' => 'solid_doors',
    ];
$fittings_routes = [
    'Эконом' => 'economy_fittings',
    'Стандарт' => 'standard_fittings',
    'Премиум' => 'premium_fittings',
    ];
@endphp

href="{{route('product_page', ['head' =>
$product->category == 'door' ?
    ($product->door->type == 'interior' ?
        'interior_doors'
        :
        'entrance_doors'
    )
:
    ($product->category == 'fitting' ?
        'fittings'
        :
        ''
    )
,'direction' =>
$product->category == 'door' ?
    ($product->door->type == 'interior' ?
        ($interior_doors_routes[$product->door->material])
        :
        ($entrance_doors[$product->door->function])
    )
:
    ($product->category == 'fitting' ?
        ($fittings_routes[$product->fitting->function])
        :
        ''
    )
,'product' => $product])}}"