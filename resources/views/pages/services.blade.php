@extends('base')

@section('title')
    Услуги
@endsection

@section('main')
    @include('partials.services.hero')
    @include('partials.services.services')
    @include('partials.footer.contacts')
@endsection
