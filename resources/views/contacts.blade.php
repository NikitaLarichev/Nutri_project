@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>

    <main>
        
        <section class="section c2" id="contacts">
            <div class="lastDiv">
                <div class="div3">СВЯЗАТЬСЯ СО МНОЙ В</div>   
                <div class="div4"><a>TELEGRAM</a></div>
                <div class="div4"><a>INSTAGRAM</a></div>
                <div class="div4"><a>ВКОНТАКТЕ</a></div>
            </div>
            <img class="cPh1" src="{{asset('images/Фото 41.jpg')}}" alt="">
            <img class="cPh2" src="{{asset('images/Фото 47.jpg')}}" alt="">
        </section>
    </main>
    
</div>
@endsection