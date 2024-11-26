@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')
    <div class="container ms-mt100px">
        <div class="container">
            <a href="{{route('client', [$client->id])}}">Продукты</a>
            <a href="{{route('client_questionnaire', [$client->id])}}">Анкета</a>
            <a href="{{route('client_nj', [$client->id])}}">Дневник питания</a>
            <a href="{{route('client_recommendations', [$client->id])}}">Рекомендации</a>
            <a href="{{route('client_chat', [$client->id])}}">Чат</a>
        </div>
        @yield('client_content')
    </div>
@endsection
