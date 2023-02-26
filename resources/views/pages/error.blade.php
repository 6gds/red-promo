@extends('base')

@section('title')
    $category->title
@endsection

@section('main')
    <div class="container">
        <h2>ERROR</h2>
        <p>$error</p>
    </div>
@endsection
