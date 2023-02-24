@extends('base')

@section('title')
    Новости
@endsection

@section('main')
    @include('partials.news.hero')
    @include('partials.news.filter')
    @include('partials.news.main')
    @include('partials.footer.contacts')
@endsection
