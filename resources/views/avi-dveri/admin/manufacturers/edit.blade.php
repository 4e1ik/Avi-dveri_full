@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Производитель: {{ $manufacturer->name }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                @include('avi-dveri.admin.manufacturers._alerts')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        @php
                            $tab = $manufacturer->type === 'door' ? 'doors' : ($manufacturer->type === 'fitting' ? 'fittings' : 'general');
                        @endphp
                        @include('avi-dveri.admin.manufacturers._tabs', ['activeTab' => $tab])
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('update_manufacturer', $manufacturer) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Название <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', $manufacturer->name) }}" required maxlength="255" autocomplete="organization">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug', $manufacturer->slug) }}" maxlength="255"
                                       placeholder="Обновляется из названия при вводе (можно править вручную)">
                                <p class="help-block text-muted">
                                    Как у товаров: при изменении названия slug пересчитывается в поле; при необходимости отредактируйте slug отдельно перед сохранением.
                                </p>
                                @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Тип</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="" {{ old('type', $manufacturer->type) === '' || old('type', $manufacturer->type) === null ? 'selected' : '' }}>Без типа (общий бренд)</option>
                                    <option value="door" {{ old('type', $manufacturer->type) === 'door' ? 'selected' : '' }}>Двери</option>
                                    <option value="fitting" {{ old('type', $manufacturer->type) === 'fitting' ? 'selected' : '' }}>Фурнитура</option>
                                </select>
                                @error('type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="active" value="0">
                                    <input type="checkbox" name="active" value="1" {{ (string) old('active', $manufacturer->active ? '1' : '0') === '1' ? 'checked' : '' }}>
                                    Активен
                                </label>
                                @error('active')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>
                            <div class="admin-form-actions">
                                <button type="submit" class="btn btn-outline btn-success">Сохранить</button>
                                <a href="{{ route('manufacturers', ['type' => $manufacturer->type]) }}" class="btn btn-outline btn-default">Назад к списку</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('avi-dveri.admin.partials.slug_autofill', ['slugSourceField' => 'name'])
@endsection
