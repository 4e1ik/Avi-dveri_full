@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Редактировать тег</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('admin_tags.update', $tag) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Название <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', $tag->name) }}" required maxlength="255">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug', $tag->slug) }}" required maxlength="255">
                                @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="is_visible" value="0">
                                    <input type="checkbox" name="is_visible" value="1"
                                        {{ (string) old('is_visible', $tag->is_visible ? '1' : '0') === '1' ? 'checked' : '' }}>
                                    Показывать в каталоге
                                </label>
                            </div>
                            <hr>
                            <div class="admin-form-actions">
                                <button type="submit" class="btn btn-outline btn-success">Сохранить</button>
                                <a href="{{ route('admin_tags') }}" class="btn btn-outline btn-default">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('avi-dveri.admin.partials.slug_autofill', ['slugSourceField' => 'name'])
@endsection
