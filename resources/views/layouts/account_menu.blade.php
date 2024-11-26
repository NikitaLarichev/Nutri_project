@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')
    <div class="container ms-mt100px">
        <div class="container">
            <a href="{{route('account_nj', [$user->id])}}">Дневник питания</a>
            <a href="{{route('account_chat', [$user->id])}}">Чат</a>
        </div>
        @yield('account_content')
    </div>
@endsection
