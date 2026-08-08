@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Теги</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-right">
                            <a href="{{ route('admin_tags.create') }}" class="btn btn-outline btn-success">
                                <span class="fa fa-plus"></span> Добавить тег
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Slug</th>
                                <th>Товаров</th>
                                <th style="width: 320px;">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($tags as $index => $tag)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>{{ $tag->products_count }}</td>
                                    <td>
                                        <div class="admin-tags-actions">
                                            <form action="{{ route('admin_tags.toggle_visibility', $tag) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                @if ($tag->is_visible)
                                                    <button type="submit" class="btn btn-outline btn-warning btn-sm">Выключить</button>
                                                @else
                                                    <button type="submit" class="btn btn-outline btn-success btn-sm">Включить</button>
                                                @endif
                                            </form>
                                            <a href="{{ route('admin_tags.edit', $tag) }}"
                                               class="btn btn-outline btn-primary btn-sm">Изменить</a>
                                            <form action="{{ route('admin_tags.destroy', $tag) }}" method="post"
                                                  onsubmit="return confirm('Удалить тег?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline btn-danger btn-sm">Удалить</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Тегов пока нет.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .admin-tags-actions {
            display: inline-flex;
            flex-direction: row;
            align-items: center;
            gap: 8px;
            flex-wrap: nowrap;
            white-space: nowrap;
        }
        .admin-tags-actions form {
            display: inline;
            margin: 0;
        }
    </style>
@endsection
