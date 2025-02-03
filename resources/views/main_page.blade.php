@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>
    <div class="c1 meeting_block fs19">
        <img class="photo mx-5" src="{{asset('images/IMG_20230623_130722_553.jpg')}}" alt="">
        <div class="meeti mx-5">
            <div class="sect1Text">Приветствую вас!</div>
            <div class='meeting'>
                <div class="my-3">Меня зовут Екатерина, я:
                    <ul>
                        <li>функциональный нутрициолог</li>
                        <li>клинический психолог</li>
                        <li>член ассоциации нутрициологов и коучей по здоровью</li>
                    </ul>
                </div>

                <div class="my-3 meet-right">Работаю с людьми, которые осознали необходимость 
                менять свои привычки и образ жизни для улучшения 
                самочувствия и снижения веса
                </div>
                <div class="my-3">
                С какими проблемами можно обратиться:
                    <ul>
                        <li>снижение / стабилизация / набор веса</li>
                        <li>восстановление работы ЖКТ</li>
                        <li>выявление и восполнение дефицитов</li>
                        <li>формирование здоровых пищевых привычек и вашего рациона</li>
                        <li>вопросы оздоровления организма и сохранения молодости</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/index.js')}}"></script>
</div>
@endsection