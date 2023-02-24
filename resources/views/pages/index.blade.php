@extends('base')

@section('title')
    Главная
@endsection

@section('main')
    @include('partials.index.hero')
    @include('partials.index.about')
    @include('partials.index.values')
    @include('partials.index.services')
    @include('partials.index.works')
    @include('partials.index.partners')
    @include('partials.index.reviews')
    @include('partials.index.facts')
    @include('partials.index.news')
    @include('partials.footer.contacts')
@endsection
