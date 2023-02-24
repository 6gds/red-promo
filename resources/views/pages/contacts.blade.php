@extends('base')

@section('title')
    Контакты
@endsection

@section('main')
    @include('partials.contacts.contacts-hero')
    @include('partials.contacts.form')
    @include('partials.contacts.contacts')
@endsection


