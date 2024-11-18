@extends('layouts.admin.admin')

@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <h1>Страница создания скамеек</h1>
        </div>
        <form action="{{ route('doors.store')}}"
              enctype="multipart/form-data" method="post">
            @csrf
            <div class="col-md-12 padding-0">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="col-md-3">
                                <h3>Картинка</h3>
                                <label for="file_input" class="dropzone dz-clickable">
                                    <span>Drop files here to upload</span>
                                </label>
                                <input style="display: none" id="file_input" type="file" name="image[]" multiple="multiple">
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Название двери</h3>
                                <div class="col-md-11 padding-0">
                                    <input class="form-control {{$errors->has('title') ? 'danger' : ''}}"
                                           type="text"
                                           name="name" value="{{old('title')}}">
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
                                           type="text"
                                           name="name" value="{{old('price_per_canvas')}}">
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
                                           type="text"
                                           name="name" value="{{old('price_per_set')}}">
                                </div>
                                @error('price_per_set')
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
                                           name="name" value="{{old('glass')}}">
                                </div>
                                @error('glass')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Назначение</h3>
                                <div class="col-md-11 padding-0">
                                    <input class="form-control {{$errors->has('function') ? 'danger' : ''}}"
                                           type="text"
                                           name="name" value="{{old('function')}}">
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
                                           name="name" value="{{old('material')}}">
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
                                            <option {{ $errors->has('type') ? '' : 'selected' }} disabled>Выберите тип двери</option>
                                            <option {{ old('type') == 'entrance' ? 'selected' : ''}} value="entrance">Входные</option>
                                            <option {{ old('type') == 'interior' ? 'selected' : ''}}  value="interior">Межкомнатные</option>
                                        </select>
                                    </div>
                                </div>
                                @error('type')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-3 padding-0">
                                <h3>Маркер</h3>
                                <label class="col-sm-2 control-label text-right">Checkbox</label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-12 padding-0">
                                            <input type="checkbox" name="option"> Checkbox One
                                        </div>
                                        <div class="col-sm-12 padding-0">
                                            <input type="checkbox" name="option"> Checkbox two
                                        </div>
                                    </div>
                                @error('type')
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