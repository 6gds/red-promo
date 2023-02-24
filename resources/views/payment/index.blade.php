@extends('base')

@section('title')
    Оплата
@endsection

@section('main')
    <h5>Текущий баланс</h5>
    <div>
        @if (cache()->has('balance'))
            {{cache()->get('balance')}}
        @else
            0
        @endif
    </div>
    <h2>Пополнить баланс</h2>
    <form action="{{route('payment.create', 1)}}" method="post">
        @csrf
        <label class="form-field form-field_gray contacts-form__field">
            <span class="form-field__caption">Email</span>
            <input type="email" name="email" placeholder="Ваш email" class="form-field__input">

            <button type="submit">Отправка</button>
        </label>
    </form>
    @foreach ($transactions as $transaction)
        <p>{{$transaction->id}}</p>
        <p>{{$transaction->status}}</p>
    @endforeach
@endsection
