@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div class="container">
    <h4 class="m-5">Список методических материалов</h4>
    @livewire('client-list-modal')
    <form class="c1 m-5" method="post" enctype="multipart/form-data" action="{{route('mat_loading')}}">
        @csrf
        <input class="form-control w-25 c1" type="file" name="file" multiple/>
        @error('file')
            <div class="alert alert-danger w-25">{{ $message }}</div>
        @enderror
        <input class="btn button-outline c3 my-2" type="submit" value="Загрузить файл"/>
    </form>
</div>


@endsection
