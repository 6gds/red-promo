@extends('base')

@section('title')
    $category->title
@endsection

@section('main')
    @include('partials.categories.hero')
    @include('partials.categories.main')
    @include('partials.footer.contacts')
@endsection
