@extends('layouts.admin.admin')
@section('content')
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Производители — общие бренды</h3>
                    <p class="text-muted" style="margin-top: 8px;">Бренды без привязки к типу (<code>type</code> пустой) — на будущее или смешанный ассортимент.</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                @include('avi-dveri.admin.manufacturers._alerts')

                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-left" style="padding-top: 8px;">
                            @include('avi-dveri.admin.manufacturers._tabs', ['activeTab' => 'general'])
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('create_manufacturer', ['type' => 'general']) }}" class="btn btn-outline btn-success">
                                <span class="fa fa-plus"></span> Добавить производителя
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('avi-dveri.admin.manufacturers._table', ['manufacturers' => $manufacturers])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
