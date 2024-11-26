@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div class="container ms-m15">
    @livewire('client-list')
</div>
@endsection