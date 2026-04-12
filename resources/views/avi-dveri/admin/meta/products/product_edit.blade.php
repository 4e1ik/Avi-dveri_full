@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">{{ $title }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="{{ route('admin_meta_product_template_update', ['metaTemplateProduct' => $metaTemplateProduct]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="productType" value="{{ $metaTemplateProduct->productType }}">
                            <input type="hidden" name="type" value="{{ $metaTemplateProduct->type ?? '' }}">
                            <input type="hidden" name="function" value="{{ $metaTemplateProduct->function ?? '' }}">
                            <input type="hidden" name="material" value="{{ $metaTemplateProduct->material ?? '' }}">
                            <p class="text-muted small">В шаблонах можно использовать переменную <code>{title}</code> — подставится название товара.</p>
                            <div class="form-group">
                                <label for="titleTemplate">Шаблон заголовка (titleTemplate)</label>
                                <input type="text" class="form-control" id="titleTemplate" name="titleTemplate" value="{{ old('titleTemplate', $metaTemplateProduct->titleTemplate ?? '') }}" maxlength="255">
                                @error('titleTemplate')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descriptionTemplate">Шаблон описания (descriptionTemplate)</label>
                                <textarea class="form-control" id="descriptionTemplate" name="descriptionTemplate" rows="10">{{ old('descriptionTemplate', $metaTemplateProduct->descriptionTemplate ?? '') }}</textarea>
                                @error('descriptionTemplate')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="admin-form-actions">
                                <button type="submit" class="btn btn-outline btn-success">Сохранить</button>
                                <a href="{{ route('admin_meta_products') }}" class="btn btn-outline btn-default">Назад к товарам</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
