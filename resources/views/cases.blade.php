@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>
    <section class="section c4" id="otzivi">
        <h3 class="div">ОТЗЫВЫ</h3>
        @foreach($reviews as $review)
            <div class="otziv">{{$review->content}}<div class="name">
                @foreach($users as $user)
                    @if($user->id == $review->client_id)
                        {{$user->name}}
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
    </section>
    @if(Auth::check())
        @if(Auth::user()->role == 'user')
            <form class="m-4" method="post" action="{{route('case_create')}}">
                @csrf
                <textarea class="form-controller" type="text" name="content" placeholder="оставьте свой отзыв здесь"></textarea>
                <input class="btn btn-primary btn-outline" type="submit" value="отправить"/>
            </form>
        @endif
    @endif
</div>
@endsection
