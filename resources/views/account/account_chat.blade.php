@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')
    <div class="container my-4">
       @livewire('chat')       
    </div>
@endsection
