@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div class="container">
    @livewire('client-list')
</div>
@endsection