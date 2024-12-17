@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <h1>Страница создания фурнитуры</h1>
        </div>
        <form action="{{ route('fittings.store')}}"
              enctype="multipart/form-data" method="post">
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
                                           type="text"
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
                                           type="text"
                                           name="price_per_set" value="{{old('price_per_set')}}">
                                </div>
                                @error('price_per_set')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Сегмент</h3>
                                <div class="col-md-12 padding-0">
                                    <div class="col-md-11 padding-0">
                                        <select class="form-control" name="function">
                                            <option {{ $errors->has('function') ? '' : 'selected' }} disabled>Выберите сегмент фурнитуры
                                            </option>
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
                                @error('function')
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
                                        <input type="checkbox" name="label[]" value="new"> Новинка
                                    </div>
                                    <div class="col-md-3 padding-0">
                                        <input type="checkbox" name="label[]" value="sale"> Скидка
                                    </div>
                                    <div class="col-md-3 padding-0">
                                        <input type="checkbox" name="label[]" value="hit"> Хит
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
                                      placeholder="Введите описание товара">{{$errors->has('description') ? 'danger' : ''}}</textarea>
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