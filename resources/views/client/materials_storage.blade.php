@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div class="container ms-mt100px">
    @livewire('client-list-modal');
    <form method="post" enctype="multipart/form-data" action="{{route('mat_loading')}}">
        @csrf
        <input type="file" name="file" multiple/>
        <input type="submit" value="загрузить"/>
    </form>
</div>


@endsection
