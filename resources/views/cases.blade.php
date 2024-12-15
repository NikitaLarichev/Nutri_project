@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div class="c1">
    <div class="section c1" id="otzivi">
        <h3 class="div">ОТЗЫВЫ</h3>
        @foreach($reviews as $review)
            <div class="otziv c2">{{$review->content}}<div class="name">
                @foreach($users as $user)
                    @if($user->id == $review->client_id)
                        <i>{{$user->name}}</i>
                    @endif
                @endforeach
            </div>
            @if(Auth::check())
    	        @if(Auth::user()->role == 'admin')
                    <a class="small" href="{{route('case_del', [$review->id])}}">удалить</a>
                @endif
            @endif
        </div>
        @endforeach
    </div>
    @if(Auth::check())
        @if(Auth::user()->role == 'user')
            <form class="m-4" method="post" action="{{route('case_create')}}">
                @csrf
                <textarea class="form-controller" type="text" name="content" placeholder="оставьте свой отзыв здесь"></textarea>
                <input class="button-outline py-1 px-2 c3" type="submit" value="Отправить"/>
            </form>
        @endif
    @endif
</div>
@endsection
