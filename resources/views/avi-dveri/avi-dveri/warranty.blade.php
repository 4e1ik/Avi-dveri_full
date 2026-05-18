@extends('layouts.avi-dveri.avi-dveri')

@php
    $warranty = config('pages_content.warranty');
    $return = config('pages_content.return');
@endphp

@section('content')
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>Гарантия</h1>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('home') }}">Главная</a></li>
                                <li>Гарантия</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-us-area pt-80 pb-80">
        <div class="container">
            <div class="contact-us customer-login bg-white">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="single-pro-tab-menu">
                            <ul class="nav d-block">
                                <li><a class="active" href="#warranty" data-bs-toggle="tab">{{ $warranty['title'] }}</a></li>
                                <li><a href="#return" data-bs-toggle="tab">{{ $return['title'] }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active" id="warranty">
                                <div class="pro-tab-info pro-description">
                                    <p class="tab-title title-border mb-30">{{ $warranty['title'] }}</p>
                                    @foreach($warranty['paragraphs'] as $paragraph)
                                        <p>{{ $paragraph }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="return">
                                <div class="pro-tab-info pro-description">
                                    <p class="tab-title title-border mb-30">{{ $return['title'] }}</p>
                                    @foreach($return['paragraphs'] as $paragraph)
                                        <p>{{ $paragraph }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
