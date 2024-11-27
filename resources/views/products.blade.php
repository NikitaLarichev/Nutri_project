@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>
    <main>
        <div>
            <h1>БЕСПЛАТНЫЕ ГАЙДЫ</h1>
            <div id="productsDiv" class="extraPadding">
                <div class="prodDiv"><div class="prod photo1"></div><div class="prodText"><h3 class="h3p">Гайд<h3><h4 class="h4p">"Основные шаги к здоровому образу жизни"</h4><div class="prodText2">(база - тарелка питания, водный режим, сон, физ. активность) или чем помочь себе уже сегодня</div><div class="priceDiv"><p class="price">Бесплатно</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Гайд<h3><h4 class="h4p">"Основные шаги к здоровому образу жизни"</h4><div class="prodText2">(база - тарелка питания, водный режим, сон, физ. активность) или чем помочь себе уже сегодня</div><div class="desc">Описание</div><div class="priceDiv"><p class="price">Бесплатно</p></div></div></div></div>
                <div class="prodDiv"><div class="prod photo2"></div><div class="prodText"><h3 class="h3p">Сборник рецептов</h3><h4 class="h4p">на 7 дней<br>"Мой сытный завтрак"</h4><div class="prodText2">простые и быстрые рецепты для начала идеального дня</div><div class="priceDiv"><p class="price">Бесплатно</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Сборник рецептов</h3><h4 class="h4p">на 7 дней<br>"Мой сытный завтрак"</h4><div class="prodText2">простые и быстрые рецепты для начала идеального дня</div><div class="desc">Описание</div><div class="priceDiv"><p class="price">Бесплатно</p></div></div></div></div>
                <div class="prodDiv"><div class="prod photo3"></div><div class="prodText"><h3 class="h3p">Конструктор вкусных напитков</h3><h4 class="h4p">на каждое время года</h4><div class="priceDiv"><p class="price">Бесплатно</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Конструктор вкусных напитков</h3><h4 class="h4p">на каждое время года</h4><div class="desc">Описание</div><div class="priceDiv"><p class="price">Бесплатно</p></div></div></div></div>
        </div>
        <section class="c1 prodFont" id="products">
            @livewire('products-component', ['products'=>$products])
            <!-- <div id="productsDiv" class="prodPadding">
                <div class="prodDiv"><div class="prod photo5"></div><div class="prodText"><h3 class="h3p">Сборник рецептов</h3><h4 class="h4p">"Вкусный ужин"</h4><div class="prodText2">простые и быстрые рецепты для всей семьи.</div><div class="priceDiv"><p class="price">500 руб.</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Сборник рецептов</h3><h4 class="h4p">"Вкусный ужин"</h4><div class="prodText2">простые и быстрые рецепты для всей семьи.</div><div class="desc">Описание</div><div class="priceDiv"><p class="price">500 руб.</p></div></div></div></div>
                <div class="prodDiv"><div class="prod photo1"></div><div class="prodText"><h3 class="h3p">Гайд</h3><h4 class="h4p">"Сахар. Моя независимость"</h4><div class="prodText2">помощник в работе с зависимостью от сладкого и мучного.</div><div class="priceDiv"><p class="price">1000  руб.</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Гайд</h3><h4 class="h4p">"Сахар. Моя независимость"</h4>помощник в работе с зависимостью от сладкого и мучного.<div class="prodText2">помощник в работе с зависимостью от сладкого и мучного.</div><div class="desc">Описание</div><div class="priceDiv"><p class="price">1000 руб.</p></div></div></div></div>
                <div class="prodDiv"><div class="prod photo2"></div><div class="prodText"><h3 class="h3p">Конструктор/Сборник</h3><h4 class="h4p">"Перекусы в дорогу/с собой"</h4><div class="prodText2">удобные варианты для перекусов в дороге или вне дома.</div><div class="priceDiv"><p class="price">500 руб.</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Конструктор/Сборник</h3><h4 class="h4p">"Перекусы в дорогу/с собой"</h4><div class="prodText2">удобные варианты для перекусов в дороге или вне дома.</div<div class="desc">Описание</div><div class="priceDiv"><p class="price">500 руб.</p></div></div></div></div>
                <div class="prodDiv"><div class="prod photo3"></div><div class="prodText"><h3 class="h3p">Сборник снэков</h3><h4 class="h4p">"Не чипсы"</h4><div class="prodText2">* полезные идеи для уютных вечеров.</div><div class="priceDiv"><p class="price">1000 руб.</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Сборник снэков</h3><h4 class="h4p">"Не чипсы"</h4><div class="prodText2">* полезные идеи для уютных вечеров.</div><div class="desc">Описание</div><div class="priceDiv"><p class="price">1000 руб.</p></div></div></div></div>                
            </div>
            <div id="productsDiv" class="extraPadding">
                <div class="prodDiv"><div class="prod photo4"></div><div class="prodText"><h3 class="h3p">Продукт 4</h3><div class="prodText2">Консультация-диагностика 30-40 минут + устные рекомендации (или бесплатно в начале)</div><div class="priceDiv"><p class="price">Бесплатно</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Продукт 4</h3><div class="prodText2">Консультация-диагностика 30-40 минут + устные рекомендации (или бесплатно в начале)</div><div class="desc">Описание</div><div class="priceDiv"><p class="price">Бесплатно</p></div></div></div></div>   
                <div class="prodDiv"><div class="prod photo4"></div><div class="prodText"><h3 class="h3p">Индивидуальная консультация</h3><h4 class="h4p">Разбор и корректировка рациона</h4><div class="prodText2">Чёткий ориентир и понимание того, что необходимо делать для достижения желаемого результата и пошаговые рекомендации для самостоятельной работы.</div><div class="priceDiv"><p class="price">2000 руб.</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Индивидуальная консультация</h3><h4 class="h4p">Разбор и корректировка рациона</h4><div class="prodText2">Чёткий ориентир и понимание того, что необходимо делать для достижения желаемого результата и пошаговые рекомендации для самостоятельной работы.</div></p>
                    <div class="desc">
                        <ul><p>В консультацию входит: </p>
                            <li><p>Предварительное заполнение анкеты (или опросника) и дневника питания в течение 7 дней, направление результатов анализов при наличии (сбор анамнеза, оценка пищевого статуса и образа жизни)</p></li>
                            <li><p>Консультация (онлайн, аудио или видео). Длительность 60-90 минут. Формулировка запроса, выявление текущих проблем, анализ пищевых привычек, ответы на вопросы.</p></li>
                            <li><p>Рекомендации по корректировке рациона питания и образа жизни после консультации в письменном виде в течение 3 рабочих дней на почту или WhatsApp.</p></li>
                            <li><p>Обратная связь с ответами на вопросы по рекомендациям в течение 7 дней.</p></li>
                        </ul>
                    </div>
                    <p>* Проведение поддерживающих консультаций (возникновение дополнительных вопросов, необходимость расшифровки анализов или корректировка рациона питания). Длительность 60 минут. Стоимость 1 500 руб.</p>
                    <div class="priceDiv"><p class="price">2000 руб.</p></div></div></div></div>
                <div class="prodDiv"><div class="prod photo5"></div><div class="prodText"><h3 class="h3p">Индивидуальная консультация</h3><h4 class="h4p">Персональный план питания</h4><div class="prodText2">Чёткий ориентир и понимание того, что вам необходимо делать для достижения желаемого результата и пошаговые инструкции для самостоятельной работы с меню и рецептами.</div><div class="priceDiv"><p class="price">3000 руб.</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Индивидуальная консультация</h3><h4 class="h4p">Персональный план питания</h4><div class="prodText2">Чёткий ориентир и понимание того, что вам необходимо делать для достижения желаемого результата и пошаговые инструкции для самостоятельной работы с меню и рецептами.</div></p>
                    <div class="desc">
                        <ul><p>В консультацию входит: </p>
                            <li><p>Предварительное заполнение анкеты (или опросника) и дневника питания в течение 7 дней, направление результатов анализов при наличии (сбор анамнеза, оценка пищевого статуса и образа жизни)</p></li>
                            <li><p>Консультация (онлайн, аудио или видео). Длительность 60-90 минут. Формулировка запроса, выявление текущих проблем, анализ пищевых привычек, ответы на вопросы.</p></li>
                            <li><p>Рекомендации по корректировке рациона питания и образа жизни после консультации в письменном виде в течение 3 рабочих дней на почту или WhatsApp.</p></li>
                            <li><p>Файл с меню и рецептами.</p></li>
                            <li><p>Обратная связь с ответами на вопросы по рекомендациям в течение 7 дней.</p></li>
                        </ul>
                        <p>* Проведение поддерживающих консультаций (возникновение дополнительных вопросов, необходимость расшифровки анализов, корректировка рациона питания и нутритивной поддержки (БАД)). Длительность 60 минут. Стоимость 2 500 руб.</p>
                    </div><div class="priceDiv"><p class="price">3000 руб.</p></div></div></div></div>
                </div>
            <div id="productsDiv" class="extraPadding">
                <div class="prodDiv"><div class="prod photo1"></div><div class="prodText"><h3 class="h3p">Сопровождение по питанию</h3><h4 class="h4p">на 1 месяц</h4><div class="prodText2">Индивидуальный план с корректировкой питания и образа жизни для снижения веса. Ежедневная обратная связь по контролю выполнения рекомендаций для достижения желаемого результата, поддержка и мотивация.</div><div class="priceDiv"><p class="price">4000 руб.</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Сопровождение по питанию</h3><h4 class="h4p">на 1 месяц</h4><div class="prodText2">Индивидуальный план с корректировкой питания и образа жизни для снижения веса. Ежедневная обратная связь по контролю выполнения рекомендаций для достижения желаемого результата, поддержка и мотивация.</div>
                    <div class="desc">
                        <ul><p>В сопровождение входит: </p>
                            <li><p>Предварительное заполнение анкеты, опросников и дневника питания в течение 14 дней, направление результатов анализов при наличии (сбор анамнеза, оценка пищевого статуса и образа жизни)</p></li>
                            <li><p>Предварительная консультация (онлайн, аудио или видео). Длительность 60 минут. Формулировка запроса, уточнение дополнительной информации по анкете и дневнику питания, выявление и анализ текущих проблем, ответы на вопросы.</p></li>
                            <li><p>Рекомендации после консультации в письменном виде в течение 5 рабочих дней на почту или WhatsApp, включают:</p></li>
                                <ul>
                                    <li><p>индивидуальный рацион питания;</p></li>
                                    <li><p>модификацию образа жизни;</p></li>
                                    <li><p>разбор анализов при наличии и/или рекомендации по обследованию;</p></li>
                                    <li><p>нутритивная поддержка при необходимости;</p></li>
                                    <li><p>файл с рецептами завтраков, перекусов, обедов и ужинов (доп. ценность)</p></li>
                                </ul>
                            <li><p>Основная консультация (онлайн, аудио или видео). Длительность 60-90 минут. Обсуждение поставленных целей и задач, ответы на вопросы по рекомендациям.</p></li>
                            <li><p>. Ежедневная обратная связь с 10:00 до 20:00 ч. Ответы на возникающие вопросы, помощь при возникновении трудностей. Анализ приёмов пищи, режима дня и их корректировка. Дополнительные рекомендации.</p></li>
                        </ul>
                        <p>Проведение поддерживающих консультаций 1 раз в 2 недели при необходимости. Длительность 30 минут.</p>
                    </div><div class="priceDiv"><p class="price">4000 руб.</p></div></div></div></div>
                <div class="prodDiv"><div class="prod photo2"></div><div class="prodText"><h3 class="h3p">Сопровождение по питанию</h3><h4 class="h4p">на 3 месяца</h4><div class="prodText2">Индивидуальный план с корректировкой питания и образа жизни для снижения веса. Ежедневная обратная связь по контролю выполнения рекомендаций для достижения желаемого результата, поддержка и мотивация. Корректировка плана при необходимости.</div><div class="priceDiv"><p class="price">10500 руб.</p></div></div></div>
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Сопровождение по питанию</h3><h4 class="h4p">на 3 месяца</h4><div class="prodText2">Индивидуальный план с корректировкой питания и образа жизни для снижения веса. Ежедневная обратная связь по контролю выполнения рекомендаций для достижения желаемого результата, поддержка и мотивация. Корректировка плана при необходимости.</div>
                    <div class="desc">
                        <ul><p>В сопровождение входит: </p>
                            <li><p>Предварительное заполнение анкеты, опросников и дневника питания в течение 14 дней, направление результатов анализов при наличии (сбор анамнеза, оценка пищевого статуса и образа жизни)</p></li>
                            <li><p>Предварительная консультация (онлайн, аудио или видео). Длительность 60 минут. Формулировка запроса, уточнение дополнительной информации по анкете и дневнику питания, выявление и анализ текущих проблем, ответы на вопросы.</p></li>
                            <li><p>Рекомендации после консультации в письменном виде в течение 5 рабочих дней на почту или WhatsApp, включают:</p></li>
                                <ul>
                                    <li><p>индивидуальный рацион питания;</p></li>
                                    <li><p>модификацию образа жизни;</p></li>
                                    <li><p>разбор анализов при наличии и/или рекомендации по обследованию;</p></li>
                                    <li><p>нутритивная поддержка при необходимости;</p></li>
                                </ul>
                            <li><p>Основная консультация (онлайн, аудио или видео). Длительность 60-90 минут. Обсуждение поставленных целей и задач, ответы на вопросы по рекомендациям.</p></li>
                            <li><p>Файл с рецептами завтраков, перекусов, обедов и ужинов (доп. ценность).</p></li>
                            <li><p>Файл с рецептами десертов и выпечки (доп. ценность).</p></li>
                            <li><p>Ежедневная обратная связь с 10:00 до 20:00 ч. Ответы на возникающие вопросы, помощь при возникновении трудностей. Анализ приёмов пищи, режима дня и их корректировка. Дополнительные рекомендации.</p></li>
                            <li><p>Поддерживающие консультации 1 раз в 2 недели. Длительность 30 минут</p></li>
                        </ul>
                    </div><div class="priceDiv"><p class="price">10500 руб.</p></div></div></div></div>
                <div class="prodDiv"><div class="prod photo3"></div><div class="prodText"><h3 class="h3p">Сопровождение по питанию</h3><h4 class="h4p">на 6 месяцев</h4><div class="prodText2">Индивидуальный план с корректировкой питания и образа жизни для снижения веса. Ежедневная обратная связь по контролю выполнения рекомендаций для достижения желаемого результата, поддержка и мотивация. Корректировка плана при необходимости.</div><div class="priceDiv"><p class="price">19500 руб.</p></div></div></div>   
                <div class="modal"><div class="prodDivBig"><div class="close">&times;</div><div class="prodText"><h3 class="h3p">Сопровождение по питанию</h3><h4>на 6 месяцев</h4><div class="prodText2">Индивидуальный план с корректировкой питания и образа жизни для снижения веса. Ежедневная обратная связь по контролю выполнения рекомендаций для достижения желаемого результата, поддержка и мотивация. Корректировка плана при необходимости.</div>
                    <div class="desc">
                        <ul><p>В сопровождение входит: </p>
                            <li><p>Предварительное заполнение анкеты, опросников и дневника питания в течение 14 дней, направление результатов анализов при наличии (сбор анамнеза, оценка пищевого статуса и образа жизни)</p></li>
                            <li><p>Предварительная консультация (онлайн, аудио или видео). Длительность 60 минут. Формулировка запроса, уточнение дополнительной информации по анкете и дневнику питания, выявление и анализ текущих проблем, ответы на вопросы.</p></li>
                            <li><p>Рекомендации после консультации в письменном виде в течение 5 рабочих дней на почту или WhatsApp, включают:</p></li>
                                <ul>
                                    <li><p>индивидуальный рацион питания;</p></li>
                                    <li><p>модификацию образа жизни;</p></li>
                                    <li><p>разбор анализов при наличии и/или рекомендации по обследованию;</p></li>
                                    <li><p>нутритивная поддержка при необходимости;</p></li>
                                </ul>
                            <li><p>Основная консультация (онлайн, аудио или видео). Длительность 60-90 минут. Обсуждение поставленных целей и задач, ответы на вопросы по рекомендациям.</p></li>
                            <li><p>Файл с рецептами завтраков, перекусов, обедов и ужинов (доп. ценность).</p></li>
                            <li><p>Файл с рецептами десертов и выпечки (доп. ценность).</p></li>
                            <li><p>Гайд "Повышение физической активности" (доп. ценность)</p></li>
                            <li><p>Ежедневная обратная связь с 10:00 до 20:00 ч. Ответы на возникающие вопросы, помощь при возникновении трудностей. Анализ приёмов пищи, режима дня и их корректировка. Дополнительные рекомендации.</p></li>
                            <li><p>Поддерживающие консультации 1 раз в 2 недели. Длительность 30 минут</p></li>
                        </ul>
                    </div><div class="priceDiv"><p class="price">19500 руб.</p></div></div></div></div>
                </div>           
            </div>            -->
        </section>
        @if(Auth::check())
            @if(Auth::user()->role == 'admin')
                <form class="ms-5" method="post" enctype="multipart/form-data" action="{{route('create_product')}}">
                    @csrf
                    <label class="form-label my-2 mx-3" for="name" >Название</label>
                    <input class="form-control my-2 mx-4 w-50" id="name" type="text" name="name"/>
                    <label class="form-label my-2 mx-3" for="short_desc" >Короткое описание</label>
                    <input class="form-control my-2 mx-4 w-50" id="short_desc" type="text" name="short_desc"/>
                    <label class="form-label my-2 mx-4" for="desc" >Полное описание</label>
                    <textarea class="form-control my-2 mx-4 w-50" id="desc" type="textarea" name="description"></textarea>
                    <label class="form-label my-2 mx-4" for="price" >Цена</label>
                    <input class="form-control my-2 mx-4 w-50" id="price" type="number" name="price"/>
                    <label class="form-label my-2 mx-4" for="img" >Изображение</label>
                    <input class="form-control my-2 mx-4 w-50" id="img" type="file" name="file" multiple/>
                    <input class="btn btn-primary my-2 mx-4" type="submit" value="Добавить услугу"/>
                </form>
            @endif
        @endif
    <script src="{{asset('js/index.js')}}"></script>
    <!-- <script>
        let nuu = document.getElementById("name");
        nuu.value = 'hrhrhrhr';
        console.log(nuu);
    </script> -->
</div>
@endsection