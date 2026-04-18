@php
    $homeBenefits = [
        ['icon' => 'store', 'title' => 'Большой выбор', 'text' => 'Межкомнатные и входные двери, фурнитура — подберём решение под ваш интерьер и бюджет.'],
        ['icon' => 'label', 'title' => 'Честные цены', 'text' => 'Актуальные предложения и понятная стоимость без скрытых доплат.'],
        ['icon' => 'headset-mic', 'title' => 'Консультация', 'text' => 'Поможем с замером, комплектацией и ответим на вопросы по товарам.'],
        ['icon' => 'truck', 'title' => 'Доставка', 'text' => 'Организуем доставку и согласуем удобное время — условия уточняйте при заказе.'],
        ['icon' => 'shield-check', 'title' => 'Качество', 'text' => 'Работаем с проверенными производителями и следим за соответствием заявленным характеристикам.'],
        ['icon' => 'time', 'title' => 'Работаем с 2004 года', 'text' => 'Более 20 лет на рынке — знаем продукт и помогаем с выбором дверей и фурнитуры.'],
    ];
@endphp
<!-- HOME-BENEFITS START -->
<section class="home-benefits pt-50 pb-10" aria-labelledby="home-benefits-heading">
    <div class="container">
        <div class="section-title text-center">
            <h2 id="home-benefits-heading" class="title-border">Наши преимущества</h2>
        </div>
        <div class="home-benefits-marquee">
            <div class="home-benefits-marquee__track">
                @foreach ([false, true] as $isDuplicate)
                    <div class="home-benefits-marquee__group" @if($isDuplicate) aria-hidden="true" @endif>
                        @foreach ($homeBenefits as $item)
                            <div class="home-benefits-marquee__cell px-2">
                                <div class="home-benefit-item text-center">
                                    <div class="home-benefit-icon" aria-hidden="true">
                                        <i class="zmdi zmdi-{{ $item['icon'] }}"></i>
                                    </div>
                                    <h3 class="home-benefit-title text-uppercase">{{ $item['title'] }}</h3>
                                    <p class="home-benefit-text mb-0">{{ $item['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- HOME-BENEFITS END -->
