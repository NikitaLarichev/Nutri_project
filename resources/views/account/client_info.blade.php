@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')

<div class="container my-4">
    @if(Auth::check())
        @if(Auth::user()->status == 'client')
       <div class="container">
            <form class="my-2" method="post" enctype="multipart/form-data" action={{route('anamnesis_completed')}} >
            @csrf
                <table class="c1 nj">
                    <tr>
                        <td colspan="2" align="center"><strong>Анкета состояния здоровья, стиль питания и образ жизни</strong></td>
                    </tr>
                    <tr>
                        <td>Дата заполнения</td>
                        <td><input id="completion_date" type="date" name="date_of_completion" value="{{old('date_of_completion')}}"/></td>
                    </tr>
                    <tr>
                        <td>ФИО</td>
                        <td><textarea type="text" name="fio">{{old('fio')}}</textarea>
                        @error('fio')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Дата рождения, возраст</td>
                        <td><input id="age_date" type="date" name="birthday" value="{{old('birthday')}}"/><span class="mx-3" id="age_span"></span>
                        @error('birthday')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Место жительства (город)</td>
                        <td><textarea type="text" name="city">{{old('city')}}</textarea>
                        @error('city')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td><input type="tel" name="phone" value="{{old('phone')}}"/></td>
                    </tr>
                    <tr>
                        <td>Адрес электронной почты</td>
                        <td><input type="email" name="email" value="{{Auth::user()->email}}"/>
                        @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Причины обращения за консультацией (перечислить)</td>
                        <td><textarea type="textarea" name="reasons_for_consultation">{{old('reasons_for_consultation')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Ваши цели и ожидания от работы? Какие результаты Вы хотели бы получить?</td>
                        <td><textarea type="textarea" name="desired_results">{{old('desired_results')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Рост (см)</td>
                        <td><input type="number" name="height" value="{{old('height')}}"/>
                        @error('height')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Вес (кг)</td>
                        <td><input type="number" name="weight" value="{{old('weight')}}"/>
                        @error('weight')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Какие были колебания веса? С чем, по Вашему мнению, ни были связаны?</td>
                        <td><textarea type="text" name="weight_fluctuations">{{old('weight_fluctuations')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Окружность талии (см)</td>
                        <td><input type="number" name="waist_circumference" value="{{old('waist_circumference')}}"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">Вы бы хотели:</td>
                    </tr>
                    <tr>            
                        <td>
                            <ol>
                                <li>набрать вес</li>
                                <li>снизить вес</li>
                                <li>остаться в прежнем весе</li>
                            </ol>
                        </td>
                        <td>
                            <ul>
                                <li><input type="checkbox" name="gain_weight" value="{{old('gain_weight')}}"/></li>
                                <li><input type="checkbox" name="lose_weight" value="{{old('lose_weight')}}"/></li>
                                <li><input type="checkbox" name="save_weight" value="{{old('save_weight')}}"/></li>
                            </ul>
                        </td>
                    </tr> 
                        <td>Желаемый вес (кг)</td>
                        <td><input type="number" name="desire_weight" value="{{old('desire_weight')}}"/>
                        @error('desire_weight')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Семейное положение</strong></td></tr>
                    <tr>
                        <td>Семейное положение</td>
                        <td><input type="text" name="marital_status" value="{{old('marital_status')}}"/></td>
                    </tr>
                    <tr>
                        <td>У вас есть дети?</td>
                        <td><input type="checkbox" name="children" value="{{old('children')}}"/></td>
                    </tr>
                    <tr>
                        <td>Возраст детей</td>
                        <td><input type="text" name="children_age" value="{{old('children_age')}}"/></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Работа, хобби, интересы</strong></td></tr>
                    <tr>
                        <td>Профессия и вид деятельности на данный момент</td>
                        <td><textarea type="text" name="profession">{{old('profession')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Любите ли вы свою работу?</td>
                        <td><input type="checkbox" name="do_like_your_working" value="{{old('do_like_your_working')}}"/></td>
                    </tr>
                    <tr>
                        <td>Опишите график и характер работы</td>
                        <td><textarea type="text" name="work_character">{{old('work_character')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Где работали в течение жизни, какиу вредные воздействия испытывали на себе в процессе профессиональной деятельности?</td>
                        <td><textarea type="text" name="working_history">{{old('working_history')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть у Вас хобби/увлечения</td>
                        <td><textarea type="text" name="hobby">{{old('hobby')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Как вы обычно отдыхаете?</td>
                        <td><textarea type="text" name="rest">{{old('rest')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Занимаетесь спортом? Каким и как часто?</td>
                        <td><textarea type="text" name="sport">{{old('sport')}}</textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">Сколько времени проводите:</td>
                    </tr>
                    <tr>
                        <td>1. за рулём</td>
                        <td><input type="text" name="driving_time" value="{{old('driving_time')}}"/></td>
                    </tr>
                    <tr>
                        <td>2. в транспорте</td>
                        <td><input type="text" name="transport_time" value="{{old('transport_time')}}"/></td>
                    </tr>
                    <tr>
                        <td>3. перед компьютером</td>
                        <td><input type="text" name="pc_time" value="{{old('pc_time')}}"/></td>
                    </tr>
                    <tr>
                        <td>4. на работе</td>
                        <td><input type="text" name="working_time" value="{{old('working_time')}}"/></td>
                    </tr>
                    <tr>
                        <td>5. на прогулке</td>
                        <td><input type="text" name="walking_time" value="{{old('walking_time')}}"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><strong>Вредные привычки</strong></td>
                    </tr>
                    <tr>
                        <td>Вы курите?</td>
                        <td><input type="checkbox" name="smoking" value="{{old('smoking')}}"/></td>
                    </tr>
                    <tr>
                        <td>Сколько сигарет в день?</td>
                        <td><input type="number" name="cigarets_per_day" value="{{old('cigarets_per_day')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть цель отказаться от курения?</td>
                        <td><input type="checkbox" name="do_you_want_quit_smoking" value="{{old('do_you_want_quit_smoking')}}"/></td>
                    </tr>
                    <tr>
                        <td>Вы употребляете алкоголь?</td>
                        <td><input type="checkbox" name="alcohol" value="{{old('alcohol')}}"/></td>
                    </tr>
                    <tr>
                        <td>Как часто?</td>
                        <td><input type="text" name="alcohol_how_often" value="{{old('alcohol_how_often')}}"/></td>
                    </tr>
                    <tr>
                        <td>Что вы обычно выпиваете?</td>
                        <td><input type="text" name="what_alcohol" value="{{old('what_alcohol')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли у Вас другие зависимости? Укажите какие именно</td>
                        <td><textarea type="text" name="another_dependencies">{{old('another_dependencies')}}</textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><strong>Пищевые привычки</strong></td>
                    </tr>
                    <tr>
                        <td>Сколько у Вас основных приёмов пищи в день?</td>
                        <td><input type="number" name="main_meals_amount" value="{{old('main_meals_amount')}}"/></td>
                    </tr>
                    <tr>
                        <td>Сколько перекусов?</td>
                        <td><input type="number" name="meals_amount" value="{{old('meals_amount')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли ограничения по еде?</td>
                        <td><textarea type="text" name="food_limit">{{old('food_limit')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Непереносимость продуктов</td>
                        <td><textarea type="text" name="food_intolerance">{{old('food_intolerance')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Аллергия на продукты</td>
                        <td><textarea type="text" name="food_allergy">{{old('food_allergy')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Какие жидкости вы пьёте?</td>
                        <td><textarea type="text" name="what_drink">{{old('what_drink')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Сколько чашек кофе и чая выпиваете в день?</td>
                        <td><input type="number" name="cups_of_tea_coffee" value="{{old('cups_of_tea_coffee')}}"/></td>
                    </tr>
                    <tr>
                        <td>Какие жиры и масла используете для приготовления пищи?</td>
                        <td><textarea type="text" name="cooking_oil">{{old('cooking_oil')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Какие источники сахара есть в вашем рационе?</td>
                        <td><textarea type="text" name="sugar_source">{{old('sugar_source')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Какая ваша любимая еда?</td>
                        <td><textarea type="text" name="favorite_food">{{old('favorite_food')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли тяга к определенным продуктам?</td>
                        <td><textarea type="text" name="food_cravings">{{old('food_cravings')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Избигаете ли вы какой то еды? Почему?</td>
                        <td><textarea type="text" name="food_avoid">{{old('food_avoid')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Придерживались ли Вы ранее каких либо диет или принципов питания? Если да, то каких, когда и какие были результаты?</td>
                        <td><textarea type="text" name="diet">{{old('diet')}}</textarea></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Cон</strong></td></tr>
                    <tr>
                        <td>Сколько часов Вы спите?</td>
                        <td><input type="number" name="bedtime" value="{{old('bedtime')}}"/></td>
                    </tr>
                    <tr>
                        <td>Во сколько встаёте?</td>
                        <td><input type="text" name="rising_time" value="{{old('fio')}}"/></td>
                    </tr>
                    <tr>
                        <td>Чувствуете себя отдохнувшим утром?</td>
                        <td><input type="text" name="do_you_feel_rest" value="{{old('do_you_feel_rest')}}"/></td>
                    </tr>
                    <tr>
                        <td>Во сколько вы ложитесь?</td>
                        <td><input type="text" name="asleep_time" value="{{old('asleep_time')}}"/></td>
                    </tr>
                    <tr>
                        <td>Легко засыпаете?</td>
                        <td><input type="text" name="doy_you_fall_asleep_easly" value="{{old('doy_you_fall_asleep_easly')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ночные пробуждения? Как часто? С чем связываете?</td>
                        <td><textarea type="text" name="nightly_awakening">{{old('nightly_awakening')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Вы храпите?</td>
                        <td><input type="checkbox" name="snores" value="{{old('snores')}}"/></td>
                    </tr>
                    <tr>
                        <td>Опишите Ваш режим дня: когда встаёте, что делаете после пробуждения, чем занимаетесь в течение дня, когда самый тяжёлый период дня, когда ужинаете, когда ложитесь спать?*</td>
                        <td><textarea type="text" name="daily_routine">{{old('daily_routine')}}</textarea></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Что вы делаете в данный момент для поддержания здоровья?</strong></td></tr>
                    <tr>
                        <td>Массаж</td>
                        <td><input type="checkbox" name="massage" value="{{old('massage')}}"/></td>
                    </tr>
                    <tr>
                        <td>Остеопат</td>
                        <td><input type="checkbox" name="osteopath" value="{{old('osteopath')}}"/></td>
                    </tr>
                    <tr>
                        <td>Питание</td>
                        <td><input type="checkbox" name="nutrition" value="{{old('nutrition')}}"/></td>
                    </tr>
                    <tr>
                        <td>Добавки</td>
                        <td><input type="checkbox" name="supplements" value="{{old('supplements')}}"/></td>
                    </tr>
                    <tr>
                        <td>Спорт</td>
                        <td><input type="checkbox" name="sport" value="{{old('sport')}}"/></td>
                    </tr>
                    <tr>
                        <td>Травы</td>
                        <td><input type="checkbox" name="herb" value="{{old('herb')}}"/></td>
                    </tr>
                    <tr>
                        <td>Лекарства</td>
                        <td><input type="checkbox" name="drugs" value="{{old('drugs')}}"/></td>
                    </tr>
                    <tr>
                        <td>Другое</td>
                        <td><input type="text" name="another" value="{{old('another')}}"/></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Медицинская история</strong></td></tr>
                    <tr>
                        <td>Перечислите хронические заболевания в хронологичесом порядке (подтверждённые диагнозы). Укажите год начала заболевания, кто поставид диагноз и врезультате каких исследований? Как лечили? Как часто происходят обострения? Каково состояние на данный момент?</td>
                        <td><textarea type="text" name="med_question_1">{{old('med_question_1')}}</textarea></td>
                    </tr>
                    <tr><td colspan="2" align="center">Операции</td></tr>
                    <tr>
                        <td>Были ли операции (в каком году, в связи с чем)?</td>
                        <td><textarea type="text" name="med_question_2">{{old('med_question_2')}}</textarea></td>
                    </tr>
                    <tr><td colspan="2">Были ли у Вас удалены?</td></tr>
                    <tr>
                        <td>аденоиды, гланды</td>
                        <td><input type="checkbox" name="med_question_3" value=""/>{{old('med_question_3')}}</td>
                    </tr>
                    <tr>
                        <td>апендикс</td>
                        <td><input type="checkbox" name="med_question_4" value=""/>{{old('med_question_4')}}</td>
                    </tr>
                    <tr>
                        <td>желчный пузырь</td>
                        <td><input type="checkbox" name="med_question_5" value=""/></td>
                    </tr>
                    <tr>
                        <td>матка, яичники</td>
                        <td><input type="checkbox" name="med_question_6" value="{{old('med_question_6')}}"/>{{old('med_question_5')}}</td>
                    </tr>
                    <tr>
                        <td>кисты</td>
                        <td><input type="checkbox" name="med_question_7" value=""/>{{old('med_question_7')}}</td>
                    </tr>
                    <tr>
                        <td>другое</td>
                        <td><textarea type="text" name="med_question_8">{{old('med_question_8')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Жалобы на данный момент (с указанием когда впервые появилась жалоба)? С чем Вы связываете появление жалобы? Как лечились? Что помогало, что нет?</td>
                        <td><textarea type="text" name="med_question_9">{{old('med_question_7')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли боли (где, какие, с чем связаны, характер боли, продолжительность и интенсивность, что предпринимаете?)</td>
                        <td><textarea type="text" name="med_question_10">{{old('med_question_10')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли усталость, разбитость (Когда? Чем проявляется?)</td>
                        <td><textarea type="text" name="med_question_11">{{old('med_question_11')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли аллергии на лекарства, материалы, животных, сезонная аллергия? Если есть, укажите на что и когда появилась.</td>
                        <td><textarea type="text" name="med_question_12">{{old('med_question_12')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Склонны ли вы к респираторным заболеваниям?</td>
                        <td><textarea type="text" name="med_question_13">{{old('med_question_13')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Болеете с повышением температуры тела?</td>
                        <td><textarea type="text" name="med_question_14">{{old('med_question_14')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Сколько дней?</td>
                        <td><textarea type="text" name="med_question_15">{{old('med_question_15')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Чем обычно лечитесь?</td>
                        <td><textarea type="text" name="med_question_16">{{old('med_question_16')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Как часто простуда переходит в более тяжелые формы?</td>
                        <td><textarea type="text" name="med_question_17">{{old('med_question_17')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Когда последний раз Вы принимали антибиотики?</td>
                        <td><textarea type="text" name="med_question_18" value="">{{old('med_question_18')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Сколько раз за последний год вы принимали антибиотики?</td>
                        <td><textarea type="text" name="med_question_19">{{old('med_question_19')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Состояние кожи (угревая сыпь, прыщи, сухость, дряблость или отсутсвие тонуса, шелушения, пигментация, сосудистые звёздочки)</td>
                        <td><textarea type="text" name="med_question_20">{{old('med_question_20')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Состояние волос (ломкость, сухость, выпадение, седина)</td>
                        <td><textarea type="text" name="med_question_21">{{old('med_question_21')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Состояние ногтей (ломкость, есть ли белые пятна, полоски, слоятся ли?)</td>
                        <td><textarea type="text" name="med_question_22">{{old('med_question_22')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Налет на языке</td>
                        <td><textarea type="text" name="med_question_23">{{old('med_question_23')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Изжога, отрыжка, тошнота, рвота</td>
                        <td><textarea type="text" name="med_question_24">{{old('med_question_24')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Метеоризм (Излишнее образование и отхождение газов): как часто, в какое время суток, после какой еды, через какое время после приема пищи, сопровождается ли болями, ечть ли запах?</td>
                        <td><textarea type="text" name="med_question_25">{{old('med_question_25')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Боли после еды (после какой, через какое время, какая боль, как быстро проходит, что предпринимаете)</td>
                        <td><textarea type="text" name="med_question_26">{{old('med_question_26')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Как часто происходит опорожнение кишечника (как часто ходите в туалет, в одно ли время)?</td>
                        <td><textarea type="text" name="med_question_27">{{old('med_question_27')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Бывает ли у Вас запор?*</td>
                        <td><textarea type="text" name="med_question_28">{{old('med_question_28')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Как часто, с чем связано?</td>
                        <td><textarea type="text" name="med_question_29">{{old('med_question_29')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Бывает ли у Вас диарея?*</td>
                        <td><textarea type="text" name="med_question_30">{{old('med_question_30')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Как часто? Какие факторы влияют?</td>
                        <td><textarea type="text" name="med_question_31">{{old('med_question_31')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли проблемы со стороны мочевыделительной системы (учащенные или редкие мочеиспускания)?*</td>
                        <td><textarea type="text" name="med_question_32">{{old('med_question_32')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Дискомфорт при мочеиспускании?*</td>
                        <td><textarea type="text" name="med_question_33">{{old('med_question_33')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Ходите ли в туалет ночью?*</td>
                        <td><textarea type="text" name="med_question_34">{{old('med_question_34')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли склонность к отечности? Когда появляются отёки (утро/вечер)? С чем связаны? Есть ли связь с питанием?*</td>
                        <td><textarea type="text" name="med_question_35">{{old('med_question_35')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли жалобы и проблемы со стороны сердечно-сосудистой системы (боли с грудиной, одышка, повышение давления)?*</td>
                        <td><textarea type="text" name="med_question_36">{{old('med_question_36')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>ваше стандартное давление?*</td>
                        <td><textarea type="text" name="med_question_37">{{old('med_question_37')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Бывают ли головокружения?*</td>
                        <td><textarea type="text" name="med_question_38">{{old('med_question_38')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Бывают ли головные боли (как часто, с чем связаны, что происходит до начала головной боли, что предпринимаете, что помогает?)*</td>
                        <td><textarea type="text" name="med_question_39">{{old('med_question_39')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Бывают ли чувства беспокойства, тревоги? Как Вы с ними справляетесь?*</td>
                        <td><textarea type="text" name="med_question_40">{{old('med_question_40')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли проблемы с суставами (боли при движении, скованность по утрам или в течение дня)? Были ли травмы?*</td>
                        <td><textarea type="text" name="med_question_41">{{old('med_question_41')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли жалобы со стороны дыхательной системы (кашель, одышка, храп)?*</td>
                        <td><textarea type="text" name="med_question_42">{{old('med_question_42')}}</textarea></td>
                    </tr>
                    <tr><td colspan="2" align="center">Напишите все принимаемые Вами препараты и БАДы с дозой и длительностью приема. укажите, кто их назначил (если врач, то какой? Нутрициолог или самостоятельно)</td></tr>
                    <tr>
                        <td>Лекарства</td>
                        <td><textarea type="text" name="med_question_43">{{old('med_question_43')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Бады</td>
                        <td><textarea type="text" name="med_question_44">{{old('med_question_44')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>травы</td>
                        <td><textarea type="text" name="med_question_45">{{old('med_question_45')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>гомеопатия</td>
                        <td><textarea type="text" name="med_question_46">{{old('med_question_46')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Другое</td>
                        <td><textarea type="text" name="med_question_47">{{old('med_question_47')}}</textarea></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Семейная история</strong></td></tr>
                    <tr><td colspan="2">Какими заболеваниями болели/ болеют ваши родственники</td></tr>
                    <tr>
                        <td>Мать</td>
                        <td><textarea type="text" name="mother">{{old('mother')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Отец</td>
                        <td><textarea type="text" name="father">{{old('father')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Бабушка</td>
                        <td><textarea type="text" name="grandma">{{old('grandma')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Дедушка</td>
                        <td><textarea type="text" name="grandpa">{{old('grandpa')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Братья</td>
                        <td><textarea type="text" name="brothers">{{old('brothers')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Сёстры</td>
                        <td><textarea type="text" name="sisters">{{old('sisters')}}</textarea></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Здоровье женщины</strong></td></tr>
                    <tr>
                        <td>Если были: как протекала беременность/роды?</td>
                        <td><textarea type="text" name="woman_question_1">{{old('woman_question_1')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Были ли сложности с зачатием?</td>
                        <td><textarea type="text" name="woman_question_2">{{old('woman_question_2')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Какой метод контрацепции Вы используете?</td>
                        <td><textarea type="text" name="woman_question_3">{{old('woman_question_3')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть вероятность, что Вы беременны в данный момент?</td>
                        <td><textarea type="text" name="woman_question_4">{{old('woman_question_4')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Регулярный цикл?</td>
                        <td><textarea type="text" name="woman_question_5">{{old('woman_question_5')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Есть ли мажущие выделения до/после или в середине цикла?</td>
                        <td><textarea type="text" name="woman_question_6">{{old('woman_question_6')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>На сколько обильные кровотечения?</td>
                        <td><textarea type="text" name="woman_question_7">{{old('woman_question_7')}}</textarea></td>
                    </tr>
                    <tr><td colspan="2">Испытываете ли Вы неприятные симптомы:</td></tr>
                    <tr>
                        <td>1. тяжесть в груди</td>
                        <td><input type="text" name="woman_question_8" value="{{old('woman_question_8')}}"/></td>
                    </tr>
                    <tr>
                        <td>2. овуляторные боли</td>
                        <td><input type="text" name="woman_question_9" value="{{old('woman_question_9')}}"/></td>
                    </tr>
                    <tr>
                        <td>3. другое</td>
                        <td><textarea type="text" name="woman_question_10">{{old('woman_question_10')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Подвержены ли Вы ПМС? Как это проявляется?</td>
                        <td><textarea type="text" name="woman_question_11">{{old('woman_question_11')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Наступила ли у Вас менопауза? В каком возрасте?</td>
                        <td><textarea type="text" name="woman_question_12">{{old('woman_question_12')}}</textarea></td>
                    </tr>
                    <tr>
                        <td>Дополнительная информация которую Вы хотите мне сообщить</td>
                        <td><textarea type="text" name="extra_info">{{old('extra_info')}}</textarea></td>
                    </tr>
                </table>
                <input class="button-outline c3 my-3 px-3 py-2" type="submit" name="submit" value="Отправить"/>
            </form>
            <div>@livewire('analyzes', ['user_id'=>$user->id])</div>
            <form method="post" enctype="multipart/form-data" action="{{route('analysis_loading')}}">
                @csrf
                <div class="form-label">Присоедините результаты анализов и исследований, а так же выписки (если есть) за последние полгода.</div>
                <div><input class="form-control c1 w-25" id="analizes_input" type="file" name="file"/></div>
                @error('file')<div class="alert alert-danger w-25">{{ $message }}</div>@enderror
                <input class="button-outline c3 my-3 px-3 py-2" type="submit" value="Отправить"/>
            </form>
    </div> 
    @else
    <div>Доступ закрыт</div>
    @endif
    @endif    
</div>
<script>
    let agespan = document.getElementById('age_span');
    let agedate = document.getElementById('age_date');
    let completiondate = document.getElementById('completion_date');
    completiondate.valueAsDate = new Date();
    agedate.addEventListener('input', function (){
        var text = getAge(agedate.valueAsDate);
        agespan.innerText = text;
    })
</script>
@endsection
