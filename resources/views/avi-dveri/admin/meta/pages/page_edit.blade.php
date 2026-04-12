@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">{{ $title }} — мета-теги</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="{{ route('admin_meta_page_template_update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="slug" value="{{ $metaTag->slug }}">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $metaTag->meta_title ?? '') }}" maxlength="255">
                                @error('meta_title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="10">{{ old('meta_description', $metaTag->meta_description ?? '') }}</textarea>
                                @error('meta_description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="admin-form-actions">
                                <button type="submit" class="btn btn-outline btn-success">Сохранить</button>
                                <a href="{{ route('admin_meta_pages') }}" class="btn btn-outline btn-default">Назад к страницам</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
