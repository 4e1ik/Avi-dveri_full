<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MetaPageRequest;
use App\Models\MetaTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MetaTagsPageController extends Controller
{
    private const PAGES = [
        'home' => 'Главная',
        'katalog' => 'Каталог',
        'oplata-dostavka' => 'Оплата и доставка',

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

        'furnitura' => 'Фурнитура',
        'ekonom' => 'Фурнитура. Эконом',
        'standart' => 'Фурнитура. Стандарт',
        'premium' => 'Фурнитура. Премиум',
    ];

    public function pages(): View
    {
        $pages = self::PAGES;
        return view('avi-dveri.admin.meta.pages.pages', compact('pages'));
    }

    public function editPageTemplate(Request $request): View|RedirectResponse
    {
        $slug = $request->input('slug');
        if ($slug === null || !isset(self::PAGES[$slug])) {
            abort(404, 'Неизвестная страница');
        }
        $metaTag = MetaTag::where('slug', $slug)->first();
        if ($metaTag === null) {
            $metaTag = MetaTag::create([
                'slug' => $slug,
                'meta_title' => null,
                'meta_description' => null,
            ]);
        }
        $title = self::PAGES[$slug];
        return view('avi-dveri.admin.meta.pages.page_edit', compact('metaTag', 'title'));
    }

    public function updatePageTemplate(MetaPageRequest $request): RedirectResponse
    {
        $slug = $request->input('slug');
        if ($slug === null || !isset(self::PAGES[$slug])) {
            return redirect()->route('admin_meta_pages')->with('false', 'Неизвестная страница.');
        }
        $metaTag = MetaTag::where('slug', $slug)->first();
        $metaTag->update([
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
        ]);
        return redirect()->route('admin_meta_pages')->with('success', 'Мета-теги сохранены.');
    }
}
