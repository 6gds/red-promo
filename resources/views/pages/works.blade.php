@extends('base')

@section('title')
    Продукты
@endsection

@section('main')
    @include('partials.works.hero')
    @include('partials.works.filter')
    @include('partials.works.main')
    @include('partials.footer.contacts')
@endsection
