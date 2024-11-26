@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>

    <main>
        
        <section class="c5 section3" id="about_me">
            <h3 class="div">ОБО МНЕ</h3>
            <div id="Osebe">
                <img class="photo" src="{{asset('images/IMG_20230623_130723_088.jpg')}}" alt=""><div class="sect1Text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In odio, dolor eos reiciendis alias consequuntur ad ut nostrum saepe natus aliquam ab ipsum culpa? Odit libero tenetur error numquam cupiditate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, sit tempora molestiae nam sunt tempore cupiditate nulla? Consequuntur facere nobis assumenda animi, aliquid quas eos modi vitae dolorem dignissimos illo! Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi vero deleniti, ipsum sint nisi repellendus, repellat perferendis nam necessitatibus laborum maiores odit ab quasi fugiat accusamus excepturi reprehenderit asperiores sunt?</div>
            </div>
        </section>
        <section class="section c3" id="education">
            <h3 class="div">ОБРАЗОВАНИЕ</h3>
            <div class="div">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium saepe perspiciatis doloribus vel, eveniet quisquam, rem neque obcaecati fugit eligendi nesciunt doloremque a illo libero, veniam fuga tempora voluptatem quas?</div>
            <div id="album">
                <div id="leftArrow" class="str">&lt;</div>
                <img id="diplom" src="{{asset('images/1.png')}}" alt="Место для диплома">
                <div id="rightArrow" class="str">&gt;</div>
            </div>
        </section>
       
</div>
@endsection