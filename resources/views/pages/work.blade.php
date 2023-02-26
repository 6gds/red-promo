@extends('base')

@section('title')
    Продукт
@endsection

@section('main')
    @include('partials.work.hero')
    @include('partials.work.content')
    @include('partials.work.reviews')
    @include('partials.work.form')
    @include('partials.footer.contacts')
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/img.js') }}"></script>
@endsection
