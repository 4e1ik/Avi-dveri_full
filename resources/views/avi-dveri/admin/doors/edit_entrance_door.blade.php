@extends('layouts.admin.admin')
@section('content')
    <script>const colors =  @json($colors);</script>
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Редактирование: входные двери</h3>
                    <p class="text-muted admin-product-form-lead">{{ $product->title }}</p>
                </div>
            </div>
        </div>
        <form class="admin-product-form" action="{{ route('products.update',  ['product' => $product])}}"
              enctype="multipart/form-data" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" name="category" value="{{ $product->category }}">
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
                            <div class="col-md-9">
                                <div class="preview-images" id="preview-container"></div>
                                <div class="database-images" id="database-container">
                                        @foreach($product->images as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="" data-id="{{ $image->id }}" data-color="{{ $image->door_color }}" data-description="{{$image->description_image}}" data-price="{{ $image->price }}" data-price-per-set="{{ $image->price_per_set }}">
                                        @endforeach
                                        <input type="hidden" id="delete-images" name="delete_images" value="">
                                </div>
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
                                               value="{{$errors->has('title') ? old('title') : $product->title}}">
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
                                               value="{{$errors->has('slug') ? old('slug') : $product->slug}}">
                                        <small class="text-muted">Если пусто — сгенерируется из названия.</small>
                                @error('slug')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            @include('avi-dveri.admin.partials.product_brand_select', [
                                'category' => $product->category,
                                'selectedManufacturerId' => $product->manufacturer_id
                            ])
                            <div class="admin-product-card-field">
                                <h3>Цена <span class="admin-field-hint">(карточка товара)</span></h3>
                                        <input class="input form-control {{$errors->has('price') ? 'danger' : ''}}"
                                               type="number" min="0"  step="0.01"
                                               name="price" value="{{$errors->has('price') ? old('price') : $product->price}}">
                                    @error('price')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
{{--                            <div class="admin-product-card-field">--}}
{{--                                <h3>Цена <span class="admin-field-hint">(комплект)</span></h3>--}}
{{--                                        <input class="input form-control {{$errors->has('price_per_set') ? 'danger' : ''}}"--}}
{{--                                               type="number" min="0"  step="0.01"--}}
{{--                                               name="price_per_set" value="{{$errors->has('price_per_set') ? old('price_per_set') : $product->price_per_set}}">--}}
{{--                                    @error('price_per_set')--}}
{{--                                    <div class="text-danger">--}}
{{--                                        {{$message}}--}}
{{--                                    </div>--}}
{{--                                    @enderror--}}
{{--                            </div>--}}
                            <div class="admin-product-card-field">
                                <h3>Валюта</h3>
                                        <select class="form-control" name="currency">
                                            <option {{ $errors->has('currency') ? '' : 'selected' }} disabled>Выберите валюту
                                            </option>
                                            <option {{ $product->currency == 'BYN' ? 'selected' : ''}} selected value="BYN">
                                                BYN
                                            </option>
                                            <option {{ $product->currency == 'RUB' ? 'selected' : ''}}  value="RUB">
                                                RUB
                                            </option>
                                            <option {{ $product->currency == 'dollar' ? 'selected' : ''}}  value="dollar">
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
                                               name="glass" value="{{$errors->has('glass') ? old('glass') : $product->door->glass}}">
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
                                                <option {{ $errors->has('material') ? '' : 'selected' }} disabled>
                                                    Выберите материал двери
                                                </option>
                                                @enderror
                                            <option {{ $product->door->function == 'Улица' ? 'selected' : ''}} value="Улица">
                                                Улица
                                            </option>
                                            <option {{ $product->door->function == 'Квартира' ? 'selected' : ''}}  value="Квартира">
                                                Квартира
                                            </option>
                                            <option {{ $product->door->function == 'Терморазрыв' ? 'selected' : ''}}  value="Терморазрыв">
                                                Терморазрыв
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Материал</h3>
                                <div class="col-md-12 padding-0">
                                    <div class="col-md-11 padding-0">
                                        <select @error('material') style="color: #FF6656" class="form-control danger" @enderror class="form-control" name="material">
                                            @error('material')
                                            <option disabled selected>
                                                {{$message}}
                                            </option>
                                            @else
                                                <option {{ $errors->has('material') ? '' : 'selected' }} disabled>
                                                    Выберите материал двери
                                                </option>
                                                @enderror
                                                <option {{ $product->door->material == 'Металл/МДФ' ? 'selected' : ''}} value="Металл/МДФ">
                                                    Металл/МДФ
                                                </option>
                                                <option {{ $product->door->material == 'МДФ/МДФ' ? 'selected' : ''}} value="МДФ/МДФ">
                                                    МДФ/МДФ
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="entrance">
                                </div>
                            </div>
                            <div class="admin-product-section clearfix">
                                <h4 class="admin-product-section__title">Статус и маркетинг</h4>
                                <div class="row">
                            @include('avi-dveri.admin.partials.product_label_checkboxes', ['selectedLabels' => old('label', $product->label ?? [])])
                            @include('avi-dveri.admin.partials.product_availability_radios', ['product' => $product])
                            <div class="col-md-3 padding-0 admin-product-field-block">
                                <div class="form-group">
                                    <div class="col-md-10 padding-0">
                                        <h3>Сделать активным?</h3>
                                        <div class="col-md-2 padding-0">
                                            <input type="radio" name="active" value="1" {{ $product->active ? 'checked' : '' }}> Да
                                        </div>
                                        <div class="col-md-2 padding-0">
                                            <input type="radio" name="active" value="0" {{ !$product->active ? 'checked' : '' }}> Нет
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                            <div class="admin-product-section admin-product-section--sizes clearfix">
                                <h4 class="admin-product-section__title">Размеры</h4>
                                <p class="admin-product-section__lead text-muted">Произвольный формат (например 880×2050) и стандартные значения из списка. Плюс — дублирует строку, корзина — удаляет (последнюю строку убрать нельзя).</p>
                                <div class="row">
                                @foreach($product->door->size as $size)
                                <div class="inputSize col-md-3 padding-0">
                                    <h3>Размер <span class="admin-field-hint">(произвольный)</span></h3>
                                    <div class="admin-product-size-field">
                                        <input class="form-control admin-product-size-input {{$errors->has('size_diff') ? 'danger' : ''}}"
                                               type="text"
                                               name="size_diff[]" value="{{$errors->has('size_diff') ? old('size') : $size}}"
                                               placeholder="напр. 880x2050">
                                        @include('avi-dveri.admin.partials.product_size_row_actions')
                                    </div>
                                </div>
                                @endforeach
                                @error('size_diff')
                                    <div class="col-md-12 text-danger small" style="margin-bottom:8px;">{{ $message }}</div>
                                @enderror
                            <div class="inputSize col-md-3 padding-0">
                                <h3>Размер <span class="admin-field-hint">(фиксированный)</span></h3>
                                <div class="admin-product-size-field">
                                        <select class="form-control admin-product-size-input" name="size_standard[]">
                                            <option {{ $errors->has('size_standard') ? '' : 'selected' }} disabled>Размер (фиксированный)
                                            </option>
                                            <option {{ old('size_standard') == '860x2050' ? 'selected' : ''}} value="860x2050">
                                                860x2050
                                            </option>
                                            <option {{ old('size_standard') == '960x2050' ? 'selected' : ''}} value="960x2050">
                                                960x2050
                                            </option>
                                            <option {{ old('size_standard') == '880x2050' ? 'selected' : ''}} value="880x2050">
                                                880x2050
                                            </option>
                                            <option {{ old('size_standard') == '980x2050' ? 'selected' : ''}} value="980x2050">
                                                980x2050
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
                                               value="{{ $errors->has('meta_title') ? old('meta_title') : $product->meta_title }}">
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
                                                  placeholder="@error('meta_description') {{ $message }} @enderror">{{ $errors->has('meta_description') ? old('meta_description') : $product->meta_description }}</textarea>
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
                            <div style="margin:0;" class="row">
                                <textarea id="description" name="description" style="width: 100%;" rows="10" type="text"
                                          placeholder="Введите описание товара">{{$errors->has('description') ? old('description') : $product->description}}</textarea>
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
                            <input type="submit" class="btn btn-outline btn-success" value="Сохранить">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('avi-dveri.admin.partials.slug_autofill')
@endsection