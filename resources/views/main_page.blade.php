@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>
    <div class="c1">
        <img class="photo" src="{{asset('images/IMG_20230623_130722_553.jpg')}}" alt="">
        <div class="sect1Text">Рада приветстовать Вас на своей странице!</div>
    </div>
    <script src="{{asset('js/index.js')}}"></script>
</div>
@endsection