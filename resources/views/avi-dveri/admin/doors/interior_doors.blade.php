@extends('layouts.admin.admin')

@section('content')
    <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Межкомнатные двери</h3>
                </div>
                <p class="content-header-actions" style="margin: 12px 0 0;">
                    <a href="{{ route('products.create', ['type' => 'interior_door']) }}" class="btn btn-outline btn-success">Добавить товар</a>
                </p>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"><h3>Межкомнатные двери</h3></div>
                    <div class="panel-body">
                        <div class="responsive-table">
                            <table id="datatables-example" class="table table-striped table-bordered" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Название</th>
{{--                                    <th>Описание</th>--}}
                                    <th>Цена за полотно</th>
{{--                                    <th>Размер</th>--}}
{{--                                    <th>Стекло</th>--}}
{{--                                    <th>Материал</th>--}}
                                    <th>Ярлык</th>
                                    <th>Активный</th>
                                    <th>Редактировать</th>
                                    <th>Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($products->isNotEmpty())
                                    @foreach($products as $product)
                                        @if(!empty($product->door))
                                            <tr>
                                                <td>{{$product->title}}</td>
{{--                                                <td>{!! $product->description !!}</td>--}}
                                                <td>{{$product->price}}</td>
{{--                                                <td>--}}
{{--                                                    @if(!empty($product->door->size))--}}
{{--                                                        @foreach($product->door->size as $size)--}}
{{--                                                            {{$size}} <br>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
{{--                                                <td>{{$product->door->glass}}</td>--}}
{{--                                                <td>{{$product->door->material}}</td>--}}
                                                <td>@if(!empty($product->label))
                                                        @foreach($product->label as $label)
                                                            {{$label}} <br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($product->active == 1)
                                                        Да
                                                    @else
                                                        Нет
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-outline btn-primary btn-sm">Редактировать</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('products.destroy', ['product' => $product]) }}"
                                                          method="post" class="admin-inline-form">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline btn-danger btn-sm">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: content -->
@endsection