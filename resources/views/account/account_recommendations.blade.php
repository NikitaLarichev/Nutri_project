@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')


<div class="container ms-m15">
        @foreach($recommendations as $rec)
            <div class="my-4">
                <h5>{{$rec->date}}</h5>
                <div>{{$rec->content}}</div>
            </div>
        @endforeach
</div>
@endsection
