<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\ReviewService;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    private array $names = [
        'Александр', 'Елена', 'Сергей', 'Мария', 'Дмитрий', 'Анна', 'Игорь', 'Ольга',
        'Павел', 'Наталья', 'Андрей', 'Виктория', 'Максим', 'Екатерина', 'Никита',
    ];

    private array $comments = [
        'Отличная дверь, качество на высоте. Установили быстро и аккуратно.',
        'Полностью соответствует описанию. Рекомендую магазин.',
        'Хорошее соотношение цены и качества. Довольны покупкой.',
        'Дверь выглядит стильно, закрывается мягко. Спасибо!',
        'Заказывали под размер — всё идеально подошло.',
        'Менеджеры помогли с выбором, доставка вовремя.',
        'Качество материалов приятно удивило. Берём ещё одну.',
        'Шумоизоляция реально работает, в квартире стало тише.',
        'Красивая фурнитура и аккуратная сборка. Рекомендую.',
        'Покупкой довольны всей семьёй. Будем советовать друзьям.',
    ];

    public function run(): void
    {
        $reviewService = app(ReviewService::class);

        Product::query()->orderBy('id')->chunkById(50, function ($products) use ($reviewService) {
            foreach ($products as $product) {
                $count = random_int(3, 6);

                for ($i = 0; $i < $count; $i++) {
                    $product->reviews()->create([
                        'name' => $this->names[array_rand($this->names)],
                        'rating' => random_int(4, 5),
                        'comment' => $this->comments[array_rand($this->comments)],
                        'is_hidden' => false,
                        'fake' => true,
                    ]);
                }

                $reviewService->recalculateRatingAvg($product);
            }
        });
    }
}
