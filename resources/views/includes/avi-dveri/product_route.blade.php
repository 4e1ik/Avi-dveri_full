@php
$entrance_doors = [
    'Улица' => 'ulica',
    'Квартира' => 'kvartira',
    'Терморазрыв' => 'termorazryv',
];
$interior_doors_routes = [
    'Экошпон' => 'ekoshpon',
    'Полипропилен' => 'polipropilen',
    'Эмаль' => 'emal',
    'Скрытые' => 'skrytye',
    'Массив' => 'massiv',
];
$fittings_routes = [
    'Эконом' => 'ekonom',
    'Стандарт' => 'standart',
    'Премиум' => 'premium',
];
@endphp

href="{{route('product_page', ['head' =>
$product->category == 'door' ?
    ($product->door->type == 'interior' ?
        'mezhkomnatnye-dveri'
        :
        'vhodnye-dveri'
    )
:
    ($product->category == 'fitting' ?
        'furnitura'
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