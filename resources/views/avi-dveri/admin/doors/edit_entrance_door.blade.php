@extends('layouts.admin.admin')
<script>const colors =  @json($colors);</script>
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <h1>Страница редактирования входных дверей</h1>
        </div>
        <form action="{{ route('products.update',  ['product' => $product])}}"
              enctype="multipart/form-data" method="post">
            @method('PUT')
            @csrf
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel">
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
                                            <img src="{{ asset('storage/' . $image->image) }}" alt="" data-id="{{ $image->id }}" data-color="{{ $image->door_color }}" data-description="{{$image->description_image}}">
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
                    <div class="panel">
                        <div id="panel-body" class="panel-body">
                            <div class="col-md-3 padding-0">
                                <h3>Название</h3>
                                <div style="margin:0" class="row">
                                    <div class="col-md-11 padding-0">
                                        <input class="input form-control {{$errors->has('title') ? 'danger' : ''}}"
                                               type="text"
                                               name="title"
                                               value="{{$errors->has('title') ? old('title') : $product->title}}">
                                    </div>
                                </div>
                                <div style="position: absolute; margin:0;" class="row">
                                    @error('title')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Цена</h3>
                                <div style="margin:0" class="row">
                                    <div class="col-md-11 padding-0">
                                        <input class="input form-control {{$errors->has('price') ? 'danger' : ''}}"
                                               type="number" min="0"  step="0.01"
                                               name="price" value="{{$errors->has('price') ? old('price') : $product->price}}">
                                    </div>
                                </div>
                                <div style="position: absolute; margin:0;" class="row">
                                    @error('price')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Цена за комплект</h3>
                                <div style="margin:0" class="row">
                                    <div class="col-md-11 padding-0">
                                        <input class="input form-control {{$errors->has('price_per_set') ? 'danger' : ''}}"
                                               type="number" min="0"  step="0.01"
                                               name="price_per_set" value="{{$errors->has('price_per_set') ? old('price_per_set') : $product->price_per_set}}">
                                    </div>
                                </div>
                                <div style="position: absolute; margin:0;" class="row">
                                    @error('price_per_set')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Валюта</h3>
                                <div class="col-md-12 padding-0">
                                    <div class="col-md-11 padding-0">
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
                                            <option {{ $product->door->function == 'street' ? 'selected' : ''}} value="street">
                                                Улица
                                            </option>
                                            <option {{ $product->door->function == 'apartment' ? 'selected' : ''}}  value="apartment">
                                                Квартира
                                            </option>
                                            <option {{ $product->door->function == 'thermal_break' ? 'selected' : ''}}  value="thermal_break">
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
                                                <option {{ $product->door->material == 'metal/mdf' ? 'selected' : ''}} value="metal/mdf">
                                                    Металл/МДФ
                                                </option>
                                                <option {{ $product->door->material == 'mdf/mdf' ? 'selected' : ''}} value="mdf/mdf">
                                                    МДФ/МДФ
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="entrance">
                            <div style="height: 7em" class="col-md-3 padding-0">
                                <h3>Маркер</h3>
                                <label style="display: none" class="col-sm-2 control-label text-right">Checkbox</label>
                                <div class="col-sm-10 padding-0">
                                    <div class="col-md-6 padding-0">
                                        <input type="checkbox" name="label[]"
                                               {{ is_array($product->label) && in_array('new', $product->label) ? 'checked' : '' }} value="new">
                                        Новинка
                                    </div>
                                    <div class="col-md-6 padding-0">
                                        <input type="checkbox" name="label[]"
                                               {{ is_array($product->label) && in_array('sale', $product->label) ? 'checked' : '' }} value="sale">
                                        Скидка
                                    </div>
                                    <div class="col-md-6 padding-0">
                                        <input type="checkbox" name="label[]"
                                               {{ is_array($product->label) && in_array('hit', $product->label) ? 'checked' : '' }} value="hit">
                                        Хит
                                    </div>
                                    <div class="col-md-6 padding-0">
                                        <input type="checkbox" name="label[]"
                                               {{ is_array($product->label) && in_array('order', $product->label) ? 'checked' : '' }} value="order">
                                        На заказ
                                    </div>
                                </div>
                            </div>
                            <div style="height: 7em" class="col-md-3 padding-0">
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
                            </div>
                                @foreach($product->door->size as $size)
                                <div id="size" class="inputSize col-md-3 padding-0">
                                    <h3>Размер</h3>
                                    <div style="display: flex; justify-content: space-between;" class="col-md-10 padding-0">
                                        <input class="form-control {{$errors->has('size_diff') ? 'danger' : ''}}"
                                               type="text"
                                               name="size_diff[]" value="{{$errors->has('size_diff') ? old('size') : $size}}">
                                        <div style="font-size: 30px; cursor: pointer;" class="col-md-2 ">
                                            <span class="addButton icons icon-plus"></span>
                                        </div>
                                        <div style="font-size: 30px; cursor: pointer;" class="col-md-2">
                                            <span class="closeButton icons icon-close"></span>
                                        </div>
                                    </div>
                                    @error('size_diff')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                              @endforeach
                            <div id="size" class="inputSize col-md-3 padding-0">
                                <h3>Размер (фикс.)</h3>
                                <div style="display: flex; justify-content: space-between;" class="col-md-11 padding-0">
                                    <div class="col-md-11 padding-0">
                                        <select class="form-control" name="size_standard[]">
                                            <option {{ $errors->has('size_standard') ? '' : 'selected' }} disabled>Размер (фикс.)
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
                                    </div>
                                    <div style="font-size: 30px; cursor: pointer;" class="col-md-1 ">
                                        <span class="addButton icons icon-plus"></span>
                                    </div>
                                    <div style="font-size: 30px; cursor: pointer;" class="col-md-1">
                                        <span class="closeButton icons icon-close"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-12 padding-0">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="panel">--}}
{{--                        <div class="panel-body">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="col-md-3 padding-0">--}}
{{--                                    <h3>Meta Title</h3>--}}
{{--                                    <div style="margin:0" class="row">--}}
{{--                                        <div class="col-md-11 padding-0">--}}
{{--                                            <input class="form-control {{$errors->has('meta_title') ? 'danger' : ''}}"--}}
{{--                                                   type="text"--}}
{{--                                                   name="meta_title" value="{{$product->meta_title}}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div style="position: absolute; margin:0;" class="row">--}}
{{--                                        @error('meta_title')--}}
{{--                                        <div class="text-danger">--}}
{{--                                            {{$message}}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8 padding-0">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="col-md-8 padding-0">--}}
{{--                                            <h3>Meta Description</h3>--}}
{{--                                            <div style="margin:0;" class="row">--}}
{{--                                                <textarea name="meta_description" style="width: 100%;" rows="10" type="text"--}}
{{--                                                          placeholder="Введите описание товара">{{$errors->has('meta_description') ? old('meta_description') : $product->meta_description}}</textarea>--}}
{{--                                            </div>--}}
{{--                                            <div style="position: absolute; margin:0;" class="row">--}}
{{--                                                @error('meta_description')--}}
{{--                                                <div class="text-danger">--}}
{{--                                                    {{$message}}--}}
{{--                                                </div>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <h3>Описание</h3>
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
                    <div class="panel">
                        <div class="panel-body">
                            <input type="submit" class="btn  btn-3d btn-success" value="Сохранить">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection