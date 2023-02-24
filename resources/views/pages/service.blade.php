@extends('base')

@section('title')
    Услуга
@endsection

@section('main')
    @include('partials.service.hero')
    @include('partials.service.offer')
    @include('partials.service.create-process')
    @include('partials.service.price-list')
    @include('partials.service.partners')
    @include('partials.footer.contacts')
@endsection
