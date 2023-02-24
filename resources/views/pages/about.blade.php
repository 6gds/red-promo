@extends('base')

@section('title')
    О нас
@endsection

@section('main')
    @include('partials.about.hero')
    @include('partials.about.achievement')
    @include('partials.about.content')
    @include('partials.index.partners')
    @include('partials.about.values')
    @include('partials.about.team')
    @include('partials.footer.contacts')
@endsection
