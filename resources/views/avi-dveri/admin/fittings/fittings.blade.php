@extends('layouts.admin.admin')

@section('content')
    <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Фурнитура</h3>
                </div>
                <ul class="nav navbar-nav">
                    <a href="{{route('fittings.create')}}">
                        <button class="btn ripple btn-outline btn-primary">
                            <div>
                                <span>Добавить товар</span>
                                <span class="ink"></span>
                            </div>
                        </button>
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"><h3>Фурнитура</h3></div>
                    <div class="panel-body">
                        <div class="responsive-table">
                            <table id="datatables-example" class="table table-striped table-bordered" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Цена за полотно</th>
                                    <th>Цена за комплект</th>
                                    <th>Ярлык</th>
                                    <th>Активный</th>
                                    <th>Редактировать</th>
                                    <th>Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($fittings->isNotEmpty())
                                    @foreach($fittings as $fitting)
                                        <tr>
                                            <td>{{$fitting->id}}</td>
                                            <td>{{$fitting->title}}</td>
                                            <td>{{$fitting->description}}</td>
                                            <td>{{$fitting->price_per_canvas}}</td>
                                            <td>{{$fitting->price_per_set}}</td>
                                            <td>@if(!empty($fitting->label))
                                                    @foreach($fitting->label as $item)
                                                        {{$item}}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if($fitting->active == 1)
                                                    Да
                                                @else
                                                    Нет
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('fittings.edit', ['fitting' => $fitting]) }}">
                                                    <input type="button" class=" btn btn-3d btn-primary"
                                                           value="Редактировать">
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('fittings.destroy', ['fitting' => $fitting]) }}"
                                                      method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" style="border: 0">
                                                        <input type="button" class="btn btn-3d btn-danger"
                                                               value="Удалить">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
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