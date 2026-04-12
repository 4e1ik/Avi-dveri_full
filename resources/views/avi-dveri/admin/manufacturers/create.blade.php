@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Новый производитель</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                @include('avi-dveri.admin.manufacturers._alerts')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        @include('avi-dveri.admin.manufacturers._tabs', ['activeTab' => $type === 'door' ? 'doors' : ($type === 'fitting' ? 'fittings' : 'general')])
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('store_manufacturer') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Название <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') }}" required maxlength="255" autocomplete="organization">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug') }}" maxlength="255"
                                       placeholder="Заполняется из названия при вводе (можно изменить вручную)">
                                @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Тип</label>
                                @if($type === 'door')
                                    <input type="hidden" name="type" value="door">
                                    <p class="form-control-static"><span class="label label-primary">Двери</span></p>
                                @elseif($type === 'fitting')
                                    <input type="hidden" name="type" value="fitting">
                                    <p class="form-control-static"><span class="label label-info">Фурнитура</span></p>
                                @else
                                    <select class="form-control" id="type" name="type">
                                        <option value="" {{ old('type') === '' || old('type') === null ? 'selected' : '' }}>Без типа (общий бренд)</option>
                                        <option value="door" {{ old('type') === 'door' ? 'selected' : '' }}>Двери</option>
                                        <option value="fitting" {{ old('type') === 'fitting' ? 'selected' : '' }}>Фурнитура</option>
                                    </select>
                                    @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="active" value="0">
                                    <input type="checkbox" name="active" value="1" {{ (string) old('active', '1') === '1' ? 'checked' : '' }}>
                                    Активен (показывать в списках выбора на сайте)
                                </label>
                                @error('active')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>
                            <div class="admin-form-actions">
                                <button type="submit" class="btn btn-outline btn-success">Сохранить</button>
                                <a href="{{ route('manufacturers', ['type' => $type]) }}" class="btn btn-outline btn-default">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('avi-dveri.admin.partials.slug_autofill', ['slugSourceField' => 'name'])
@endsection
