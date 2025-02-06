@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <h1>Страница создания фурнитуры</h1>
        </div>
        <form action="{{ route('products.store')}}"
              enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="category" value="fitting">
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
                            <div class="col-md-9" id="preview-container">
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
                                               value="{{old('title')}}">
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
                                        <input name="price" class="input form-control {{$errors->has('price') ? 'danger' : ''}}"
                                               type="number" min="0" step="0.01"
                                               value="{{old('price')}}">
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
                                               type="number" min="0" step="0.01"
                                               name="price_per_set"
                                               value="{{old('price_per_set')}}">
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
                                                <option {{ old('function') == 'economy' ? 'selected' : ''}} value="economy">
                                                    Эконом
                                                </option>
                                                <option {{ old('function') == 'standard' ? 'selected' : ''}}  value="standard">
                                                    Стандарт
                                                </option>
                                                <option {{ old('function') == 'premium' ? 'selected' : ''}}  value="premium">
                                                    Премиум
                                                </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 7em" class="col-md-3 padding-0">
                                <h3>Маркер</h3>
                                <label style="display: none" class="col-sm-2 control-label text-right">Checkbox</label>
                                <div class="col-sm-10 padding-0">
                                    <div class="col-md-6 padding-0">
                                        <input type="checkbox" name="label[]"
                                               {{ is_array(old('label')) && in_array('new', old('label')) ? 'checked' : '' }} value="new">
                                        Новинка
                                    </div>
                                    <div class="col-md-6 padding-0">
                                        <input type="checkbox" name="label[]"
                                               {{ is_array(old('label')) && in_array('sale', old('label')) ? 'checked' : '' }} value="sale">
                                        Скидка
                                    </div>
                                    <div class="col-md-6 padding-0">
                                        <input type="checkbox" name="label[]"
                                               {{ is_array(old('label')) && in_array('hit', old('label')) ? 'checked' : '' }} value="hit">
                                        Хит
                                    </div>
                                    <div class="col-md-6 padding-0">
                                        <input type="checkbox" name="label[]"
                                               {{ is_array(old('label')) && in_array('order', old('label')) ? 'checked' : '' }} value="order">
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
{{--            <div class="col-md-12 padding-0">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="panel">--}}
{{--                        <div class="panel-body">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="col-md-3 padding-0">--}}
{{--                                    <h3>Meta Title</h3>--}}
{{--                                    <div style="margin:0" class="row">--}}
{{--                                        <div class="col-md-11 padding-0">--}}
{{--                                            <input class="input form-control {{$errors->has('meta_title') ? 'danger' : ''}}"--}}
{{--                                                   type="text"--}}
{{--                                                   name="meta_title" value="{{old('meta_title')}}">--}}
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
{{--                                            <div style="margin:0" class="row">--}}
{{--                                                <textarea class="textarea form-control {{$errors->has('meta_description') ? 'danger' : ''}}"--}}
{{--                                                          name="meta_description" style="width: 100%;" rows="10" type="text">--}}
{{--                                                {{$errors->has('meta_description') ? '' : old('meta_description')}}--}}
{{--                                            </textarea>--}}
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
                            <div style="margin:0" class="row">
                                <textarea class="textarea form-control {{$errors->has('description') ? 'danger' : ''}}"
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
                    <div class="panel">
                        <div class="panel-body">
                            <input type="submit" class="btn  btn-3d btn-success" value="Создать">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection