@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Мета-теги — Страницы</h3>
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
                    <div class="panel-heading"><h3>Страницы</h3></div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Страница</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $slug => $title)
                                <tr>
                                    <td>{{ $title }}</td>
                                    <td>
                                        <a href="{{ route('admin_meta_page_template_edit', ['slug' => $slug]) }}" class="btn btn-primary btn-sm">Редактировать</a>
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
