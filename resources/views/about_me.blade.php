@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>
    <div class="c1 section3" id="about_me">
        <h3 class="div">ОБО МНЕ</h3>
        <div id="Osebe">
            <img class="photo" src="{{asset('images/IMG_20230623_130723_088.jpg')}}" alt="">
            <div class="sect1Text fs19 text-start">
            <p>Спасибо за проявленный интерес и доверие!</p>
            Родилась и выросла в Ярославской области.<br/>
            Училась и больше 10 лет жила и работала в Санкт-Петербурге. <br/>
            Вышла замуж и живу в Великом Новгороде.<br/>
            Имею высшее образование по специальности клинический (медицинский) психолог.<br/>
            Всё время на спортивной волне. В детстве была воспитанницей ДЮСШ по лыжному спорту и по сегодняшний день регулярно занимаюсь: кардио (особенно люблю бег), силовыми и функциональными тренировками. <br/>
            Пять лет назад поняла - для того, чтобы 365 дней в году пребывать в отличной форме и иметь крепкое здоровье, недостаточно только физической активности. Нужно правильно и сбалансировано питаться.  Поэтому погрузилась в сферу диетологии и правильного сбалансированного питания.  Это направление, которым "горит" моё сердце 24/7.<br/>
            Настолько сильно переплетены между собой психология, питание и физическая активность, что возникло желание знать больше. <br/>
            В 2021 г поступила в Институт функциональной и интегративной диетологии и нутрициологии (Университет Образовательной Медицины) и спустя год получила диплом по специальности функциональный нутрициолог.<br/>
            В мире медицины и нутрициологии постоянно всё меняется - ведутся новые исследования, проводятся новые взаимосвязи. Поэтому люблю учиться - курсы, семинары, интенсивы и применять новые знания на практике.<br/>
            В жизни я требовательная, упёртая и местами, как говорят мои родные, фанатичная.  Но как могло быть иначе, когда пытливый ум не даёт мне покоя.<br/>
            Мои интересы: медицина, наука, спорт и путешествия.<br/>
            Мой девиз: не бойтесь перемен.<br/>

            </div>
        </div>
    </div>
    <div class="section c1" id="education">
        <h3 class="div">ОБРАЗОВАНИЕ</h3>
        <div>

        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                @foreach($diploms as $index=>$diplom)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" @if($index == 0) class="active" @endif aria-current="true" aria-label="Slide {{$index + 1}}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($diploms as $index=>$diplom)
                <div
                @if($index == 0)
                    class="carousel-item active"
                @else
                    class="carousel-item"
                @endif>
                <img src="{{asset($diplom)}}" class="d-block w-100" alt="...">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev text-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
            </div>
    </div>    
    @if(Auth::check())
        @if(Auth::user()->role == 'admin')
            <form method="post" enctype="multipart/form-data" action="{{route('add_diplom')}}">
                @csrf
                <input class="form-control m-2 w-25" type="file" name="file"/>
                @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input class="btn button-outline c3 m-2" type="submit" value="Добавить изображение"/>
            </form>
        @endif
    @endif
</div>
@endsection