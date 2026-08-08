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
                        <p>При клике на название товара, можно перейти на страницу товара на сайте.</p>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 50px;">№</th>
                                <th style="width: 20%;">Название товара</th>
                                <th style="width: 100px;">Оценка</th>
                                <th>Текст отзыва</th>
                                <th style="width: 100px;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <a href="#" target="_blank">
                                            iPhone 15 Pro Max
                                        </a>
                                    </td>
                                    <td>
                                        <span style="color: #f5b342; font-size: 18px;">
                                            ★★★★★
                                        </span>
                                    </td>
                                    <td>Отличный телефон! Очень доволен покупкой. Батарея держит 2 дня.</td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-danger btn-sm" onclick="confirm('Вы уверены?')">Скрыть</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <a href="#" target="_blank">
                                            Samsung Galaxy S24 Ultra
                                        </a>
                                    </td>
                                    <td>
                                        <span style="color: #f5b342; font-size: 18px;">
                                            ★★★★☆
                                        </span>
                                    </td>
                                    <td>Хороший телефон, но дорогой. Камера супер!</td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-danger btn-sm" onclick="confirm('Вы уверены?')">Скрыть</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <a href="#" target="_blank">
                                            MacBook Pro 16"
                                        </a>
                                    </td>
                                    <td>
                                        <span style="color: #f5b342; font-size: 18px;">
                                            ★★★★★
                                        </span>
                                    </td>
                                    <td>Отличный ноутбук для работы. Экран шикарный, производительность на высоте. Рекомендую всем разработчикам.</td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-danger btn-sm" onclick="confirm('Вы уверены?')">Скрыть</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <a href="#" target="_blank">
                                            Sony WH-1000XM5
                                        </a>
                                    </td>
                                    <td>
                                        <span style="color: #f5b342; font-size: 18px;">
                                            ★★★☆☆
                                        </span>
                                    </td>
                                    <td>Неплохие наушники, но шумоподавление могло бы быть лучше.</td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-danger btn-sm" onclick="confirm('Вы уверены?')">Скрыть</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <a href="#" target="_blank">
                                            iPad Air
                                        </a>
                                    </td>
                                    <td>
                                        <span style="color: #f5b342; font-size: 18px;">
                                            ★★☆☆☆
                                        </span>
                                    </td>
                                    <td>Разочарован. За такую цену ожидал большего.</td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-danger btn-sm" onclick="confirm('Вы уверены?')">Скрыть</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection