@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Отзывы на товары</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0 admin-reviews">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3>Список отзывов</h3>
                        <p>При клике на название товара можно перейти на страницу товара на сайте.</p>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 50px;">№</th>
                                <th style="width: 20%;">Название товара</th>
                                <th style="width: 100px;">Оценка</th>
                                <th>Текст отзыва</th>
                                <th style="width: 120px;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($reviews as $index => $review)
                                @php
                                    $product = $review->reviewable;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if ($product)
                                            @php
                                                $productUrl = \App\Helpers\ProductUrlHelper::url($product);
                                            @endphp
                                            @if ($productUrl)
                                                <a href="{{ $productUrl }}" target="_blank">{{ $product->title }}</a>
                                            @else
                                                {{ $product->title }}
                                            @endif
                                            <div style="font-size: 12px; color: #888;">
                                                ID: {{ $product->id }}
                                                @if ($review->fake)
                                                    · fake
                                                @endif
                                                @if ($review->is_hidden)
                                                    · скрыт
                                                @endif
                                            </div>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        <span style="color: #f5b342; font-size: 18px;">
                                            @for ($i = 1; $i <= 5; $i++)
                                                {{ $i <= $review->rating ? '★' : '☆' }}
                                            @endfor
                                        </span>
                                    </td>
                                    <td>
                                        <strong>{{ $review->name }}</strong><br>
                                        {{ $review->comment }}
                                    </td>
                                    <td>
                                        @if ($review->is_hidden)
                                            <form method="post" action="{{ route('reviews.restore', $review) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-outline btn-success btn-sm">Вернуть</button>
                                            </form>
                                        @else
                                            <form method="post" action="{{ route('reviews.hide', $review) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-outline btn-danger btn-sm">Скрыть</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Отзывов пока нет.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
