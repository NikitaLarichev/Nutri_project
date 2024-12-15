@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')
    <div class="container">
        <div class="container">
            <a href="{{route('account_questionnaire', [$user->id])}}">Анкета</a>
            <a href="{{route('account_nj', [$user->id])}}">Дневник питания</a>
            <a href="{{route('account_recommendations', [$user->id])}}">Рекомендации</a>
            <a href="{{route('account_materials', [$user->id])}}">Материалы</a>
            <a href="{{route('account_chat', [$user->id])}}">Чат</a>
        </div>
        @yield('account_content')
    </div>
@endsection
