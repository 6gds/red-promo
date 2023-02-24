@extends('base')

@section('title')
    Новость
@endsection

@section('main')
    @include('partials.new.hero')
    @include('partials.new.content')
    @include('partials.new.comments')
    @include('partials.new.form')
    @include('partials.footer.contacts')
@endsection
