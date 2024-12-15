@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>
    <div class="c1 section3" id="about_me">
        <h3 class="div">ОБО МНЕ</h3>
        <div id="Osebe">
            <img class="photo" src="{{asset('images/IMG_20230623_130723_088.jpg')}}" alt=""><div class="sect1Text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In odio, dolor eos reiciendis alias consequuntur ad ut nostrum saepe natus aliquam ab ipsum culpa? Odit libero tenetur error numquam cupiditate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, sit tempora molestiae nam sunt tempore cupiditate nulla? Consequuntur facere nobis assumenda animi, aliquid quas eos modi vitae dolorem dignissimos illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi vero deleniti, ipsum sint nisi repellendus, repellat perferendis nam necessitatibus laborum maiores odit ab quasi fugiat accusamus excepturi reprehenderit asperiores sunt?</div>
        </div>
    </div>
    <div class="section c1" id="education">
        <h3 class="div">ОБРАЗОВАНИЕ</h3>
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