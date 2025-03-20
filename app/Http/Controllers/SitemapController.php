<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index()
    {
        // Array to store URLs
        $urls = [];

        // Статичные старницы
        //Главная страница
        $urls[] = [
            'loc' => URL::to(route('home')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '1.0'
        ];

        //Каталог
        $urls[] = [
            'loc' => URL::to(route('catalog')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '1.0'
        ];


        //Фурнитура
        $urls[] = [
            'loc' => URL::to(route('fittings')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.8'
        ];

        $urls[] = [
            'loc' => URL::to(route('economy_fittings')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.8'
        ];

        $urls[] = [
            'loc' => URL::to(route('standard_fittings')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];

        $urls[] = [
            'loc' => URL::to(route('premium_fittings')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];
        //Конец фурнитуры


        //Межкомнатные двери
        $urls[] = [
            'loc' => URL::to(route('interior_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.8'
        ];

        $urls[] = [
            'loc' => URL::to(route('eco_veneer_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];

        $urls[] = [
            'loc' => URL::to(route('polypropylene_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];

        $urls[] = [
            'loc' => URL::to(route('enamel_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];

        $urls[] = [
            'loc' => URL::to(route('hidden_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];

        $urls[] = [
            'loc' => URL::to(route('solid_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];
        //Конец межкомнатных дверей

        //Начало входных дверей
        $urls[] = [
            'loc' => URL::to(route('entrance_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.8'
        ];

        $urls[] = [
            'loc' => URL::to(route('street_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];

        $urls[] = [
            'loc' => URL::to(route('apartment_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];

        $urls[] = [
            'loc' => URL::to(route('thermal_break_doors')),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '0.6'
        ];
        //Конец входных дверей

        // Добавление динамических страниц
        //Страницы фурнитуры
        $fittings = Product::where('category', 'fitting')->where('active', 1)->get();
        foreach ($fittings as $fitting) {
            $function = $fitting->fitting->function;
            $fittings_routes = [
                'Эконом' => route('economy_fittings'),
                'Стандарт' => route('standard_fittings'),
                'Премиум' => route('premium_fittings'),
            ];

            $urls[] = [
                'loc' => URL::to($fittings_routes[$function] . '/' . $fitting->id),
                'lastmod' => $fitting->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.4'
            ];
        }

        //Страницы межкомнатных дверей
        $interior_doors = Product::where('category', 'door')
            ->whereHas('door', function ($query) {
                $query->where('type', 'interior');
            })->where('active', 1)->get();
        foreach ($interior_doors as $interior_door) {
            $material = $interior_door->door->material;
            $interior_doors_routes = [
                'Экошпон' => route('eco_veneer_doors'),
                'Полипропилен' => route('polypropylene_doors'),
                'Эмаль' => route('enamel_doors'),
                'Скрытые' => route('hidden_doors'),
                'Массив' => route('solid_doors'),
            ];

            $urls[] = [
                'loc' => URL::to($interior_doors_routes[$material] . '/' . $interior_door->id),
                'lastmod' => $interior_door->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.4'
            ];
        }

        //Страницы входных дверей
        $entrance_doors = Product::where('category', 'door')
            ->whereHas('door', function ($query) {
                $query->where('type', 'entrance');
            })->where('active', 1)->get();
        foreach ($entrance_doors as $entrance_door) {
            $function = $entrance_door->door->function;
            $entrance_doors_routes = [
                'Улица' => route('street_doors'),
                'Квартира' => route('apartment_doors'),
                'Терморазрыв' => route('thermal_break_doors'),
            ];

            $urls[] = [
                'loc' => URL::to($entrance_doors_routes[$function] . '/' . $entrance_door->id),
                'lastmod' => $entrance_door->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.4'
            ];
        }

        // Generate XML
        $xml = $this->generateSitemap($urls);

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    private function generateSitemap($urls)
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($urls as $url) {
            $urlTag = $xml->addChild('url');
            $urlTag->addChild('loc', $url['loc']);
            $urlTag->addChild('lastmod', $url['lastmod']);
            $urlTag->addChild('changefreq', $url['changefreq']);
            $urlTag->addChild('priority', $url['priority']);
        }

        return $xml->asXML();
    }
}
