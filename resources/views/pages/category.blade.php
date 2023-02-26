@extends('base')

@section('title')
    $category->title
@endsection

@section('main')
    @include('partials.category.hero')
    @include('partials.category.main')
    @include('partials.footer.contacts')
@endsection
