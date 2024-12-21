@extends('layouts.admin.admin')
<script>const colors =  @json($colors);</script>
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <h1>Страница редактирования дверей</h1>
        </div>
        <form action="{{ route('doors.update',  ['door' => $door])}}"
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
                                    @foreach($door->images as $image)
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
                                <h3>Название двери</h3>
                                <div class="col-md-11 padding-0">
                                    <input class="form-control {{$errors->has('title') ? 'danger' : ''}}"
                                           type="text"
                                           name="title" value="{{$errors->has('title') ? old('title') : $door->title}}">
                                </div>
                                @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Цена за полотно</h3>
                                <div class="col-md-11 padding-0">
                                    <input class="form-control {{$errors->has('price_per_canvas') ? 'danger' : ''}}"
                                           type="number" min="0"  step="0.01"
                                           name="price_per_canvas" value="{{$errors->has('price_per_canvas') ? old('price_per_canvas') : $door->price_per_canvas}}">
                                </div>
                                @error('price_per_canvas')
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
                                           name="price_per_set" value="{{$errors->has('price_per_set') ? old('price_per_set') : $door->price_per_set}}">
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
                                            <option {{ $door->currency == 'BYN' ? 'selected' : ''}} selected value="BYN">
                                                BYN
                                            </option>
                                            <option {{ $door->currency == 'RUB' ? 'selected' : ''}}  value="RUB">
                                                RUB
                                            </option>
                                            <option {{ $door->currency == 'dollar' ? 'selected' : ''}}  value="dollar">
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
                                           name="glass" value="{{$errors->has('glass') ? old('glass') : $door->glass}}">
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
                                            <option {{ $errors->has('function') ? '' : 'selected' }} disabled>Выберите назначение двери
                                            </option>
                                            <option {{ $door->function == 'street' ? 'selected' : ''}} value="street">
                                                Улица
                                            </option>
                                            <option {{ $door->function == 'apartment' ? 'selected' : ''}}  value="apartment">
                                                Квартира
                                            </option>
                                            <option {{ $door->function == 'thermal_break' ? 'selected' : ''}}  value="thermal_break">
                                                Терморазрыв
                                            </option>
                                            <option {{ $door->function == 'eco-veneer' ? 'selected' : ''}}  value="eco-veneer">
                                                Экошпон
                                            </option>
                                            <option {{ $door->function == 'polypropylene' ? 'selected' : ''}}  value="polypropylene">
                                                Полипропилен
                                            </option>
                                            <option {{ $door->function == 'enamel' ? 'selected' : ''}}  value="enamel">
                                                Эмаль
                                            </option>
                                            <option {{ $door->function == 'hidden' ? 'selected' : ''}}  value="hidden">
                                                Скрытые
                                            </option>
                                            <option {{ $door->function == 'solid' ? 'selected' : ''}}  value="solid">
                                                Массив
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
                                    <input class="form-control {{$errors->has('material') ? 'danger' : ''}}"
                                           type="text"
                                           name="material" value="{{$errors->has('material') ? old('material') : $door->material}}">
                                </div>
                                @error('material')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Тип двери</h3>
                                <div class="col-md-12 padding-0">
                                    <div class="col-md-11 padding-0">
                                        <select class="form-control" name="type">
                                            <option {{ $errors->has('type') ? '' : 'selected' }} disabled>Выберите тип
                                                двери
                                            </option>
                                            <option {{ $door->type == 'entrance' ? 'selected' : ''}} value="entrance">
                                                Входные
                                            </option>
                                            <option {{ $door->type == 'interior' ? 'selected' : ''}}  value="interior">
                                                Межкомнатные
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                @error('type')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div style="height: 7em" class="col-md-3 padding-0">
                                <h3>Маркер</h3>
                                <label style="display: none" class="col-sm-2 control-label text-right">Checkbox</label>
                                <div class="col-sm-10 padding-0">
                                    <div class="col-md-3 padding-0">
                                        <input type="checkbox" name="label[]" {{ is_array($door->label) && in_array('new', $door->label) ? 'checked' : '' }} value="new"> Новинка
                                    </div>
                                    <div class="col-md-3 padding-0">
                                        <input type="checkbox" name="label[]" {{ is_array($door->label) && in_array('sale', $door->label) ? 'checked' : '' }} value="sale"> Скидка
                                    </div>
                                    <div class="col-md-3 padding-0">
                                        <input type="checkbox" name="label[]" {{ is_array($door->label) && in_array('hit', $door->label) ? 'checked' : '' }} value="hit"> Хит
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
                            @foreach($door->size as $item)
                            <div id="size" class="inputSize col-md-3 padding-0">
                                <h3>Размер</h3>
                                <div style="display: flex; justify-content: space-between;" class="col-md-10 padding-0">
                                    <input class="form-control {{$errors->has('size') ? 'danger' : ''}}"
                                           type="text"
                                           name="size[]" value="{{$errors->has('size') ? old('size') : $item}}">
                                    <div style="font-size: 30px; cursor: pointer;" class="col-md-2 ">
                                        <span class="addButton icons icon-plus"></span>
                                    </div>
                                    <div style="font-size: 30px; cursor: pointer;" class="col-md-2">
                                        <span class="closeButton icons icon-close"></span>
                                    </div>
                                </div>
                                @error('size')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @endforeach
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
                                      placeholder="Введите описание товара">{{$errors->has('description') ? old('description') : $door->description}}</textarea>
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
                            <input type="submit" class="btn  btn-3d btn-success" value="Сохранить">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection