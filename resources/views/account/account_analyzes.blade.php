@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')

<div class="container my-4">
    @if(Auth::check())
        @if(Auth::user()->status == 'client')
       <div class="container">
            <div>@livewire('analyzes', ['user_id'=>$user->id])</div>
            <form method="post" enctype="multipart/form-data" action="{{route('analysis_loading')}}">
                @csrf
                <div class="form-label">Присоедините результаты анализов и исследований, а так же выписки (если есть) за последние полгода.</div>
                <div><input class="form-control c1 w-25" id="analizes_input" type="file" name="file"/></div>
                @error('file')<div class="alert alert-danger w-25">{{ $message }}</div>@enderror
                <input class="button-outline c3 my-3 px-3 py-2" type="submit" value="Отправить"/>
            </form>
    </div> 
    @else
    <div>Доступ закрыт</div>
    @endif
    @endif    
</div>
@endsection