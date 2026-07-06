<?php

return $routes = [
//    'katalog' => [
//        'dveri' => [
//            'mezhkomnatnye-dveri' => 'interior',
//            'mezhkomnatnye-dveri-material' => [
//                'ekoshpon' => 'Экошпон',
//                'polipropilen' => 'Полипропилен',
//                'emal' => 'Эмаль',
//                'skrytye' => 'Скрытые',
//                'massiv' => 'Массив',
//
//            ],
//            'vhodnye-dveri' => 'entrance',
//            'vhodnye-dveri-function' => [
//                'ulica' => 'Улица',
//                'kvartira' => 'Квартира',
//                'termorazryv' => 'Терморазрыв',
//            ],
//        ],
//        'furnitura' => [
//            'ekonom' => 'Эконом',
//            'standart' => 'Стандарт',
//            'premium' => 'Премиум',
//        ]
//    ],
    'katalog' => [
        'doors' => [
            'interior' => 'mezhkomnatnye-dveri',
            'material' => array_map(
                static fn (array $material): string => $material['slug'],
                config('door_materials')
            ),
            'vhodnye-dveri' => 'entrance',
            'vhodnye-dveri-function' => [
                'Улица' => 'ulica',
                'Квартира' => 'kvartira',
                'Терморазрыв' => 'termorazryv',
            ],
        ],
        'fittings' => [
            'Эконом' => 'ekonom',
            'Стандарт' => 'standart',
            'Премиум' => 'premium',
        ]
    ]
];