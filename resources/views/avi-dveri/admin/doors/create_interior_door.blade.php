@extends('layouts.admin.admin')
@section('content')
    <script>const colors =  @json($colors);</script>
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Создание: межкомнатные двери</h3>
                    <p class="text-muted admin-product-form-lead">Карточка товара в каталоге</p>
                </div>
            </div>
        </div>
        <form class="admin-product-form" action="{{ route('products.store')}}"
              enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="category" value="door">
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
                            @include('avi-dveri.admin.partials.product_brand_select',[
                                'category' => 'door'
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
                                <h4 class="admin-product-section__title">Характеристики двери</h4>
                                <div class="row">
                            <div class="col-md-3 padding-0">
                                <h3>Стекло</h3>
                                <div style="margin:0" class="row">
                                    <div class="col-md-11 padding-0">
                                        <input class="input form-control {{$errors->has('glass') ? 'danger' : ''}}"
                                               type="text"
                                               name="glass"
                                               value="{{old('glass')}}">
                                    </div>
                                </div>
                                <div style="position: absolute; margin:0;" class="row">
                                    @error('glass')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Назначение</h3>
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
                                                    Выберите назначение двери
                                                </option>
                                            @enderror
                                                <option {{ old('function') == 'Квартира' ? 'selected' : ''}}  value="Квартира">
                                                    Квартира
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Материал</h3>
                                <div class="col-md-11 padding-0">
                                    <select @error('material') style="color: #FF6656" class="form-control danger"
                                            @enderror class="form-control" name="material">
                                        @error('material')
                                            <option disabled selected>
                                                {{$message}}
                                            </option>
                                        @else
                                            <option {{ $errors->has('material') ? '' : 'selected' }} disabled>
                                                Выберите материал двери
                                            </option>
                                        @enderror
                                        <option {{ old('material') == 'Экошпон' ? 'selected' : ''}}  value="Экошпон">
                                            Экошпон
                                        </option>
                                        <option {{ old('material') == 'Полипропилен' ? 'selected' : ''}}  value="Полипропилен">
                                            Полипропилен
                                        </option>
                                        <option {{ old('material') == 'Эмаль' ? 'selected' : ''}}  value="Эмаль">
                                            Эмаль
                                        </option>
                                        <option {{ old('material') == 'Скрытые' ? 'selected' : ''}}  value="Скрытые">
                                            Скрытые
                                        </option>
                                        <option {{ old('material') == 'Массив' ? 'selected' : ''}}  value="Массив">
                                            Массив
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="interior">
                                </div>
                            </div>
                            <div class="admin-product-section clearfix">
                                <h4 class="admin-product-section__title">Статус и маркетинг</h4>
                                <div class="row">
                            @include('avi-dveri.admin.partials.product_label_checkboxes', ['selectedLabels' => old('label', [])])
                            @include('avi-dveri.admin.partials.product_availability_radios')
                            <div class="col-md-3 padding-0 admin-product-field-block">
                                <div class="form-group">
                                    <div class="col-md-8 padding-0">
                                        <h3>Сделать активным?</h3>
                                        <div class="choice">
                                            <div style="display: flex; justify-content: flex-start; align-items: baseline;"
                                                 class="col-md-2 padding-0">
                                                <input type="radio" name="active" value="1"> Да
                                            </div>
                                            <div style="display: flex; justify-content: flex-start; align-items: baseline;"
                                                 class="col-md-2 padding-0">
                                                <input type="radio" name="active" value="0"> Нет
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                            <div class="admin-product-section admin-product-section--sizes clearfix">
                                <h4 class="admin-product-section__title">Размеры</h4>
                                <p class="admin-product-section__lead text-muted">Произвольный формат и стандартные значения из списка. Плюс — дублирует строку, корзина — удаляет (последнюю строку убрать нельзя).</p>
                                <div class="row">
                            <div class="inputSize col-md-3 padding-0">
                                <h3>Размер <span class="admin-field-hint">(произвольный)</span></h3>
                                <div class="admin-product-size-field">
                                    <input class="form-control admin-product-size-input {{$errors->has('size_diff') ? 'danger' : ''}}"
                                           type="text"
                                           name="size_diff[]"
                                           placeholder="напр. 800x2000">
                                    @include('avi-dveri.admin.partials.product_size_row_actions')
                                </div>
                                @error('size_diff')
                                    <div class="text-danger small" style="margin-top:6px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="inputSize col-md-3 padding-0">
                                <h3>Размер <span class="admin-field-hint">(фиксированный)</span></h3>
                                <div class="admin-product-size-field">
                                        <select class="form-control admin-product-size-input" name="size_standard[]">
                                            <option {{ $errors->has('size_standard') ? '' : 'selected' }} disabled>
                                                Размер (фиксированный)
                                            </option>
                                            <option {{ old('size_standard') == '600x2000' ? 'selected' : ''}} value="600x2000">
                                                600x2000
                                            </option>
                                            <option {{ old('size_standard') == '700x2000' ? 'selected' : ''}} value="700x2000">
                                                700x2000
                                            </option>
                                            <option {{ old('size_standard') == '800x2000' ? 'selected' : ''}} value="800x2000">
                                                800x2000
                                            </option>
                                            <option {{ old('size_standard') == '900x2000' ? 'selected' : ''}} value="900x2000">
                                                900x2000
                                            </option>
                                        </select>
                                    @include('avi-dveri.admin.partials.product_size_row_actions')
                                </div>
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