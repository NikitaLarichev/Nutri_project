@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>      
    <div class="section wid c1" id="contacts">
        <div class="lastDiv">
            <div class="div3">СВЯЗАТЬСЯ СО МНОЙ В</div>   
            <div class="div4"><a href="https://t.me/@laricheva_nutrition_designer">TELEGRAM</a></div>
            <div class="div4"><a href="https://vk.com/laricheva_nutrition_designer">ВКОНТАКТЕ</a></div>
        </div>
        <img class="cPh1" src="{{asset('images/Фото 41.jpg')}}" alt="Image">
        <img class="cPh2 my-5" src="{{asset('images/Фото 47.jpg')}}" alt="Image">
    </div>
</div>
@endsection