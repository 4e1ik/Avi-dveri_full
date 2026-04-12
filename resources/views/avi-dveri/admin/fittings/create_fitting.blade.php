@extends('layouts.admin.admin')
@section('content')
    <script>const colors =  @json($colors);</script>
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Создание: фурнитура</h3>
                    <p class="text-muted admin-product-form-lead">Карточка товара в каталоге</p>
                </div>
            </div>
        </div>
        <form class="admin-product-form" action="{{ route('products.store')}}"
              enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="category" value="fitting">
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel panel-default admin-product-panel admin-product-panel--media">
                        <div class="panel-heading"><h4 class="panel-title">Изображения</h4></div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <h3>Картинка</h3>
                                <label style="display: flex; justify-content: center; align-items: center;"
                                       for="images" class="dropzone dz-clickable">
                                    <span>Переместите файлы сюда для загрузки</span>
                                </label>
                                <input style="display: none" id="images" type="file" name="image[]"
                                       multiple="multiple" accept="image/*" onchange="previewImage(event)">
                            </div>
                            <div class="col-md-9" id="preview-container">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel panel-default admin-product-panel">
                        <div class="panel-heading"><h4 class="panel-title">Основные данные</h4></div>
                        <div id="panel-body" class="panel-body">
                            <div class="admin-product-section admin-product-section--product-card clearfix">
                                <h4 class="admin-product-section__title">Карточка товара</h4>
                                <div class="admin-product-card-grid">
                            <div class="admin-product-card-field">
                                <h3>Название</h3>
                                        <input class="input form-control {{$errors->has('title') ? 'danger' : ''}}"
                                               type="text"
                                               name="title"
                                               value="{{old('title')}}">
                                    @error('title')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="admin-product-card-field">
                                <h3>Slug (ЧПУ)</h3>
                                        <input class="input form-control {{$errors->has('slug') ? 'danger' : ''}}"
                                               type="text" name="slug" id="slug" maxlength="255"
                                               value="{{old('slug')}}">
                                        <small class="text-muted">Если пусто — сгенерируется из названия.</small>
                                @error('slug')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            @include('avi-dveri.admin.partials.product_brand_select', [
                                'category' => 'fitting',
                            ])
                            <div class="admin-product-card-field">
                                <h3>Цена <span class="admin-field-hint">(карточка товара)</span></h3>
                                        <input name="price" class="input form-control {{$errors->has('price') ? 'danger' : ''}}"
                                               type="number" min="0" step="0.01"
                                               value="{{old('price')}}">
                                    @error('price')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
{{--                            <div class="admin-product-card-field">--}}
{{--                                <h3>Цена <span class="admin-field-hint">(комплект)</span></h3>--}}
{{--                                        <input class="input form-control {{$errors->has('price_per_set') ? 'danger' : ''}}"--}}
{{--                                               type="number" min="0" step="0.01"--}}
{{--                                               name="price_per_set"--}}
{{--                                               value="{{old('price_per_set')}}">--}}
{{--                                    @error('price_per_set')--}}
{{--                                    <div class="text-danger">--}}
{{--                                        {{$message}}--}}
{{--                                    </div>--}}
{{--                                    @enderror--}}
{{--                            </div>--}}
                            <div class="admin-product-card-field">
                                <h3>Валюта</h3>
                                        <select class="form-control" name="currency">
                                            <option {{ $errors->has('currency') ? '' : 'selected' }} disabled>Выберите
                                                валюту
                                            </option>
                                            <option {{ old('currency') == 'BYN' ? 'selected' : ''}} selected
                                                    value="BYN">
                                                BYN
                                            </option>
                                            <option {{ old('currency') == 'RUB' ? 'selected' : ''}}  value="RUB">
                                                RUB
                                            </option>
                                            <option {{ old('currency') == 'dollar' ? 'selected' : ''}}  value="dollar">
                                                $
                                            </option>
                                        </select>
                            </div>
                                </div>
                            </div>
                            <div class="admin-product-section clearfix">
                                <h4 class="admin-product-section__title">Классификация</h4>
                                <div class="row">
                            <div class="col-md-3 padding-0">
                                <h3>Сегмент</h3>
                                <div class="col-md-12 padding-0">
                                    <div class="col-md-11 padding-0">
                                        <select @error('function') style="color: #FF6656" class="form-control danger"
                                                @enderror class="form-control" name="function">
                                            @error('function')
                                            <option disabled selected>
                                                {{$message}}
                                            </option>
                                            @else
                                                <option {{ $errors->has('function') ? '' : 'selected' }} disabled>
                                                    Выберите сегмент фурнитуры
                                                </option>
                                                @enderror
                                                <option {{ old('function') == 'Эконом' ? 'selected' : ''}} value="Эконом">
                                                    Эконом
                                                </option>
                                                <option {{ old('function') == 'Стандарт' ? 'selected' : ''}}  value="Стандарт">
                                                    Стандарт
                                                </option>
                                                <option {{ old('function') == 'Премиум' ? 'selected' : ''}}  value="Премиум">
                                                    Премиум
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                            <div class="admin-product-section clearfix">
                                <h4 class="admin-product-section__title">Статус и маркетинг</h4>
                                <div class="row">
                            @include('avi-dveri.admin.partials.product_label_checkboxes', ['selectedLabels' => old('label', [])])
                            @include('avi-dveri.admin.partials.product_availability_radios')
                            <div class="col-md-3 padding-0 admin-product-field-block">
                                <div class="form-group">
                                    <div class="col-md-10 padding-0">
                                        <h3>Сделать активным?</h3>
                                        <div class="col-md-2 padding-0">
                                            <input type="radio" name="active" value="1"> Да
                                        </div>
                                        <div class="col-md-2 padding-0">
                                            <input type="radio" name="active" value="0"> Нет
                                        </div>
                                    </div>
                                </div>
                                @error('active')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel panel-default admin-product-panel">
                        <div class="panel-heading"><h4 class="panel-title">SEO</h4></div>
                        <div class="panel-body">
                            <div class="col-md-6 padding-0">
                                <h3>Meta Title</h3>
                                <div style="margin:0" class="row">
                                    <div class="col-md-11 padding-0">
                                        <input class="input form-control {{ $errors->has('meta_title') ? 'danger' : '' }}"
                                               type="text"
                                               name="meta_title"
                                               placeholder="@error('meta_title') {{ $message }} @enderror"
                                               value="{{ old('meta_title') }}">
                                    </div>
                                </div>
                                <div style="position: absolute; margin:0;" class="row">
                                    @error('meta_title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 padding-0">
                                <h3>Meta Description</h3>
                                <div style="margin:0" class="row">
                                    <div class="col-md-11 padding-0">
                                        <textarea class="textarea form-control {{ $errors->has('meta_description') ? 'danger' : '' }}"
                                                  name="meta_description"
                                                  rows="4"
                                                  placeholder="@error('meta_description') {{ $message }} @enderror">{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>
                                <div style="position: absolute; margin:0;" class="row">
                                    @error('meta_description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel panel-default admin-product-panel">
                        <div class="panel-heading"><h4 class="panel-title">Описание</h4></div>
                        <div class="panel-body">
                            <h3>Текст</h3>
                            <div style="margin:0" class="row">
                                <textarea id="description" class="textarea form-control {{$errors->has('description') ? 'danger' : ''}}"
                                          name="description" style="width: 100%;" rows="10" type="text">
                                    {{$errors->has('description') ? '' : old('description')}}
                                </textarea>
                            </div>
                            <div style="position: absolute; margin:0;" class="row">
                                @error('description')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel panel-default admin-product-panel admin-product-panel--actions">
                        <div class="panel-body">
                            <input type="submit" class="btn btn-outline btn-success" value="Создать">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('avi-dveri.admin.partials.slug_autofill')
@endsection