@extends('layouts.admin.admin')
<script>const colors =  @json($colors);</script>
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <h1>Страница создания межкомнатных дверей</h1>
        </div>
        <form action="{{ route('products.store')}}"
              enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="category" value="door">
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
                                <div class="col-md-11 padding-0">
                                    <input class="form-control {{$errors->has('title') ? 'danger' : ''}}"
                                           type="text"
                                           name="title" value="{{old('title')}}">
                                </div>
                                @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Цена</h3>
                                <div class="col-md-11 padding-0">
                                    <input class="form-control {{$errors->has('price') ? 'danger' : ''}}"
                                           type="number" min="0"  step="0.01"
                                           name="price" value="{{old('price')}}">
                                </div>
                                @error('price')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Цена за комплект</h3>
                                <div class="col-md-11 padding-0">
                                    <input class="form-control {{$errors->has('price_per_set') ? 'danger' : ''}}"
                                           type="number" min="0"  step="0.01"
                                           name="price_per_set" value="{{old('price_per_set')}}">
                                </div>
                                @error('price_per_set')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Валюта</h3>
                                <div class="col-md-12 padding-0">
                                    <div class="col-md-11 padding-0">
                                        <select class="form-control" name="currency">
                                            <option {{ $errors->has('currency') ? '' : 'selected' }} disabled>Выберите валюту
                                            </option>
                                            <option {{ old('currency') == 'BYN' ? 'selected' : ''}} selected value="BYN">
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
                                @error('currency')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Стекло</h3>
                                <div class="col-md-11 padding-0">
                                    <input class="form-control {{$errors->has('glass') ? 'danger' : ''}}"
                                           type="text"
                                           name="glass" value="{{old('glass')}}">
                                </div>
                                @error('glass')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Назначение</h3>
                                <div class="col-md-12 padding-0">
                                    <div class="col-md-11 padding-0">
                                        <select class="form-control" name="function">
{{--                                            <option {{ $errors->has('function') ? '' : 'selected' }} disabled>Выберите назначение двери--}}
{{--                                            </option>--}}
                                            <option {{ old('function') == 'apartment' ? 'selected' : ''}}  value="apartment" selected>
                                                Квартира
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                @error('function')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Материал</h3>
                                <div class="col-md-11 padding-0">
                                    <select class="form-control" name="material">
                                        <option {{ $errors->has('material') ? '' : 'selected' }} disabled>Выберите материал двери
                                        </option>
                                        <option {{ old('material') == 'eco-veneer' ? 'selected' : ''}}  value="eco-veneer">
                                            Экошпон
                                        </option>
                                        <option {{ old('material') == 'polypropylene' ? 'selected' : ''}}  value="polypropylene">
                                            Полипропилен
                                        </option>
                                        <option {{ old('material') == 'enamel' ? 'selected' : ''}}  value="enamel">
                                            Эмаль
                                        </option>
                                        <option {{ old('material') == 'hidden' ? 'selected' : ''}}  value="hidden">
                                            Скрытые
                                        </option>
                                        <option {{ old('material') == 'solid' ? 'selected' : ''}}  value="solid">
                                            Массив
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="interior">
                            <div style="height: 7em" class="col-md-3 padding-0">
                                <h3>Маркер</h3>
                                <label style="display: none" class="col-sm-2 control-label text-right">Checkbox</label>
                                <div class="col-sm-10 padding-0">
                                    <div class="col-md-3 padding-0">
                                        <input type="checkbox" name="label[]" {{ is_array(old('label')) && in_array('new', old('label')) ? 'checked' : '' }} value="new"> Новинка
                                    </div>
                                    <div class="col-md-3 padding-0">
                                        <input type="checkbox" name="label[]" {{ is_array(old('label')) && in_array('sale', old('label')) ? 'checked' : '' }} value="sale"> Скидка
                                    </div>
                                    <div class="col-md-3 padding-0">
                                        <input type="checkbox" name="label[]" {{ is_array(old('label')) && in_array('hit', old('label')) ? 'checked' : '' }} value="hit"> Хит
                                    </div>
                                </div>
                                @error('type')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
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
                            <div id="size" class="inputSize col-md-3 padding-0">
                                <h3>Размер (произ.)</h3>
                                <div style="display: flex; justify-content: space-between;" class="col-md-10 padding-0">
                                    <input class="form-control {{$errors->has('size_diff') ? 'danger' : ''}}"
                                           type="text"
                                           name="size_diff[]">
                                    @if($errors->has('size_diff'))
                                        {{$errors}}
                                        @foreach($errors->has('size_diff') as $error)
                                            <input class="form-control {{$errors->has('size_diff') ? 'danger' : ''}}"
                                                   type="text"
                                                   name="size_diff[]" value="">
                                        @endforeach
                                    @endif
                                    <div style="font-size: 30px; cursor: pointer;" class="col-md-2 ">
                                        <span class="addButton icons icon-plus"></span>
                                    </div>
                                    <div style="font-size: 30px; cursor: pointer;" class="col-md-2">
                                        <span class="closeButton icons icon-close"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="size" class="inputSize col-md-3 padding-0">
                                <h3>Размер (фикс.)</h3>
                                <div style="display: flex; justify-content: space-between;" class="col-md-11 padding-0">
                                    <div class="col-md-11 padding-0">
                                        <select class="form-control" name="size_standard[]">
                                            <option {{ $errors->has('size_standard') ? '' : 'selected' }} disabled>Размер (фикс.)
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
                                    </div>
                                    <div style="font-size: 30px; cursor: pointer;" class="col-md-1 ">
                                        <span class="addButton icons icon-plus"></span>
                                    </div>
                                    <div style="font-size: 30px; cursor: pointer;" class="col-md-1">
                                        <span class="closeButton icons icon-close"></span>
                                    </div>
                                </div>
                                @error('size_standard')
                                <div style="position: absolute; top: 90px" class="col-md-11 text-danger">
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
                            <h3>Описание</h3>
                            <textarea name="description" style="width: 100%;" rows="10" type="text"
                                      placeholder="Введите описание товара">{{$errors->has('description') ? 'danger' : old('description')}}</textarea>
                            @error('description')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
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