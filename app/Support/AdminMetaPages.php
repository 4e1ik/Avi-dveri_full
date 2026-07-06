<?php

namespace App\Support;

final class AdminMetaPages
{
    public const PAGES = [
        'home' => 'Главная',
        'katalog' => 'Каталог',
        'oplata-dostavka' => 'Оплата и доставка',
        'kontakty' => 'Контакты',
        'o-kompanii' => 'О компании',
        'garantiya' => 'Гарантия',
        'akcii' => 'Акции и скидки',

        'vhodnye-dveri' => 'Входные двери',
        'ulica' => 'Входные двери. Улица',
        'kvartira' => 'Входные двери. Квартира',
        'termorazryv' => 'Входные двери. Терморазрыв',

        'mezhkomnatnye-dveri' => 'Межкомнатные двери',
        'ekoshpon' => 'Межкомнатные двери. Экошпон',
        'polipropilen' => 'Межкомнатные двери. Полипропилен',
        'emal' => 'Межкомнатные двери. Эмаль',
        'skrytye' => 'Межкомнатные двери. Скрытые',
        'massiv' => 'Межкомнатные двери. Массив',
        'eksimer' => 'Межкомнатные двери. Эксимер',
        'flex-emal' => 'Межкомнатные двери. Флекс эмаль',
        'massiv-mdf' => 'Межкомнатные двери. Массив + МДФ',
        'mdf' => 'Межкомнатные двери. МДФ',
        'mdf-hdf' => 'Межкомнатные двери. МДФ+ХДФ',

        'furnitura' => 'Фурнитура',
        'ekonom' => 'Фурнитура. Эконом',
        'standart' => 'Фурнитура. Стандарт',
        'premium' => 'Фурнитура. Премиум',
    ];

    public static function slugs(): array
    {
        return array_keys(self::PAGES);
    }
}
