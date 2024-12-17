@extends('layouts.admin.admin')

@section('content')
    <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Входные двери</h3>
                </div>
                <ul class="nav navbar-nav">
                    <a href="{{route('doors.create')}}">
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
                    <div class="panel-heading"><h3>Входные двери</h3></div>
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
                                    <th>Размер</th>
                                    <th>Стекло</th>
                                    <th>Назначение</th>
                                    <th>Материал</th>
                                    <th>Ярлык</th>
                                    <th>Активный</th>
                                    <th>Редактировать</th>
                                    <th>Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($doors->isNotEmpty())
                                    @foreach($doors as $door)
                                        <tr>
                                            <td>{{$door->id}}</td>
                                            <td>{{$door->title}}</td>
                                            <td>{{$door->description}}</td>
                                            <td>{{$door->price_per_canvas}}</td>
                                            <td>{{$door->price_per_set}}</td>
                                            <td>@if(!empty($door->label))
                                                    @foreach($door->size as $item)
                                                        {{$item}}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{$door->glass}}</td>
                                            <td>{{$door->function}}</td>
                                            <td>{{$door->material}}</td>
                                            <td>@if(!empty($door->label))
                                                    @foreach($door->label as $item)
                                                        {{$item}}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if($door->active == 1)
                                                    Да
                                                @else
                                                    Нет
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('doors.edit', ['door' => $door]) }}">
                                                    <input type="button" class=" btn btn-3d btn-primary"
                                                           value="Редактировать">
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('doors.destroy', ['door' => $door]) }}"
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