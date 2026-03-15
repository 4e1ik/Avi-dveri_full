@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Мета-теги — Товары</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('false'))
                    <div class="alert alert-danger">{{ session('false') }}</div>
                @endif

                <div class="panel">
                    <div class="panel-heading"><h3>Тип продукта: Фурнитура</h3></div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Тип продукта</th>
                                <th>Подтип (function)</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fittings as $segment => $title)
                                <tr>
                                    <td>Фурнитура</td>
                                    <td>{{ $title }}</td>
                                    <td>
                                        <a href="{{ route('admin_meta_product_template_edit', ['productType' => 'fitting', 'type' => '', 'function' => $segment, 'material' => '']) }}" class="btn btn-primary btn-sm">Редактировать шаблон</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading"><h3>Тип продукта: Двери (Входные)</h3></div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Тип продукта</th>
                                <th>Тип (type)</th>
                                <th>Функция (function)</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entrance as $segment => $title)
                                <tr>
                                    <td>Двери</td>
                                    <td>Входные</td>
                                    <td>{{ $title }}</td>
                                    <td>
                                        <a href="{{ route('admin_meta_product_template_edit', ['productType' => 'door', 'type' => 'entrance', 'function' => $segment, 'material' => '']) }}" class="btn btn-primary btn-sm">Редактировать шаблон</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading"><h3>Тип продукта: Двери (Межкомнатные)</h3></div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Тип продукта</th>
                                <th>Тип (type)</th>
                                <th>Материал (material)</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($interior as $segment => $title)
                                <tr>
                                    <td>Двери</td>
                                    <td>Межкомнатные</td>
                                    <td>{{ $title }}</td>
                                    <td>
                                        <a href="{{ route('admin_meta_product_template_edit', ['productType' => 'door', 'type' => 'interior', 'function' => '', 'material' => $segment]) }}" class="btn btn-primary btn-sm">Редактировать шаблон</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
