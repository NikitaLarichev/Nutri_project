@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')

<div class="container ms-m15">
       <div class="container">
            <form method="post" action={{route('anamnesis_completed')}}>
            @csrf
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" align="center"><strong>Анкета состояния здоровья, стиль питания и образ жизни*</strong></td>
                    </tr>
                    <tr>
                        <td>Дата заполнения*</td>
                        <td><input type="date" name="date_of_completion" value="{{old('date_of_completion')}}"/></td>
                    </tr>
                    <tr>
                        <td>ФИО*</td>
                        <td><input type="text" name="fio" value="{{old('fio')}}"/></td>
                    </tr>
                    <tr>
                        <td>Дата рождения, возраст*</td>
                        <td><input type="date" name="birthday" value="{{old('birthday')}}"/></td>
                    </tr>
                    <tr>
                        <td>Место жительства (город)*</td>
                        <td><input type="text" name="city" value="{{old('city')}}"/></td>
                    </tr>
                    <tr>
                        <td>Телефон*</td>
                        <td><input type="tel" name="phone" value="{{old('phone')}}"/></td>
                    </tr>
                    <tr>
                        <td>Адрес электронной почты*</td>
                        <td><input type="email" name="email" value="{{Auth::user()->email}}"/></td>
                    </tr>
                    <tr>
                        <td>Причины обращения за консультацией (перечислить)*</td>
                        <td><input type="textarea" name="reasons_for_consultation" value="{{old('reasons_for_consultation')}}"/></td>
                    </tr>
                    <tr>
                        <td>Ваши цели и ожидания от работы? Какие результаты Вы хотели бы получить?*</td>
                        <td><input type="textarea" name="desired_results" value="{{old('desired_results')}}"/></td>
                    </tr>
                    <tr>
                        <td>Рост (см)*</td>
                        <td><input type="number" name="height" value="{{old('height')}}"/></td>
                    </tr>
                    <tr>
                        <td>Вес (кг)*</td>
                        <td><input type="number" name="weight" value="{{old('weight')}}"/></td>
                    </tr>
                    <tr>
                        <td>Какие были колебания веса? С чем, по Вашему мнению, ни были связаны?*</td>
                        <td><input type="text" name="weight_fluctuations" value="{{old('weight_fluctuations')}}"/></td>
                    </tr>
                    <tr>
                        <td>Окружность талии (см)*</td>
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
                        <td>Желаемый вес (кг)*</td>
                        <td><input type="number" name="desire_weight" value="{{old('desire_weight')}}"/></td>
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
                        <td><input type="text" name="profession" value="{{old('profession')}}"/></td>
                    </tr>
                    <tr>
                        <td>Любите ли вы свою работу?</td>
                        <td><input type="checkbox" name="do_like_your_working" value="{{old('do_like_your_working')}}"/></td>
                    </tr>
                    <tr>
                        <td>Опишите график и характер работы</td>
                        <td><input type="text" name="work_character" value="{{old('work_character')}}"/></td>
                    </tr>
                    <tr>
                        <td>Где работали в течение жизни, какиу вредные воздействия испытывали на себе в процессе профессиональной деятельности?</td>
                        <td><input type="text" name="working_history" value="{{old('working_history')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть у Вас хобби/увлечения</td>
                        <td><input type="text" name="hobby" value="{{old('hobby')}}"/></td>
                    </tr>
                    <tr>
                        <td>Как вы обычно отдыхаете?</td>
                        <td><input type="text" name="rest" value="{{old('rest')}}"/></td>
                    </tr>
                    <tr>
                        <td>Занимаетесь спортом? Каким и как часто?</td>
                        <td><input type="text" name="sport" value="{{old('sport')}}"/></td>
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
                        <td>Вы курите?*</td>
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
                        <td>Вы употребляете алкоголь?*</td>
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
                        <td><input type="text" name="another_dependencies" value="{{old('another_dependencies')}}"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><strong>Пищевые привычки</strong></td>
                    </tr>
                    <tr>
                        <td>Сколько у Вас основных приёмов пищи в день?*</td>
                        <td><input type="number" name="main_meals_amount" value="{{old('main_meals_amount')}}"/></td>
                    </tr>
                    <tr>
                        <td>Сколько перекусов?*</td>
                        <td><input type="number" name="meals_amount" value="{{old('meals_amount')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли ограничения по еде?</td>
                        <td><input type="text" name="food_limit" value="{{old('food_limit')}}"/></td>
                    </tr>
                    <tr>
                        <td>Непереносимость продуктов</td>
                        <td><input type="text" name="food_intolerance" value="{{old('food_intolerance')}}"/></td>
                    </tr>
                    <tr>
                        <td>Аллергия на продукты</td>
                        <td><input type="text" name="food_allergy" value="{{old('food_allergy')}}"/></td>
                    </tr>
                    <tr>
                        <td>Какие жидкости вы пьёте?*</td>
                        <td><input type="text" name="what_drink" value="{{old('what_drink')}}"/></td>
                    </tr>
                    <tr>
                        <td>Сколько чашек кофе и чая выпиваете в день?</td>
                        <td><input type="number" name="cups_of_tea_coffee" value="{{old('cups_of_tea_coffee')}}"/></td>
                    </tr>
                    <tr>
                        <td>Какие жиры и масла используете для приготовления пищи?</td>
                        <td><input type="text" name="cooking_oil" value="{{old('cooking_oil')}}"/></td>
                    </tr>
                    <tr>
                        <td>Какие источники сахара есть в вашем рационе?</td>
                        <td><input type="text" name="sugar_source" value="{{old('sugar_source')}}"/></td>
                    </tr>
                    <tr>
                        <td>Какая ваша любимая еда?</td>
                        <td><input type="text" name="favorite_food" value="{{old('favorite_food')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли тяга к определенным продуктам?</td>
                        <td><input type="text" name="food_cravings" value="{{old('food_cravings')}}"/></td>
                    </tr>
                    <tr>
                        <td>Избигаете ли вы какой то еды? Почему?</td>
                        <td><input type="text" name="food_avoid" value="{{old('food_avoid')}}"/></td>
                    </tr>
                    <tr>
                        <td>Придерживались ли Вы ранее каких либо диет или принципов питания? Если да, то каких, когда и какие были результаты?</td>
                        <td><input type="text" name="diet" value="{{old('diet')}}"/></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Cон</strong></td></tr>
                    <tr>
                        <td>Сколько часов Вы спите?*</td>
                        <td><input type="number" name="bedtime" value="{{old('bedtime')}}"/></td>
                    </tr>
                    <tr>
                        <td>Во сколько встаёте?*</td>
                        <td><input type="text" name="rising_time" value="{{old('fio')}}"/></td>
                    </tr>
                    <tr>
                        <td>Чувствуете себя отдохнувшим утром?*</td>
                        <td><input type="text" name="do_you_feel_rest" value="{{old('do_you_feel_rest')}}"/></td>
                    </tr>
                    <tr>
                        <td>Во сколько вы ложитесь?*</td>
                        <td><input type="text" name="asleep_time" value="{{old('asleep_time')}}"/></td>
                    </tr>
                    <tr>
                        <td>Легко засыпаете?*</td>
                        <td><input type="text" name="doy_you_fall_asleep_easly" value="{{old('doy_you_fall_asleep_easly')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ночные пробуждения? Как часто? С чем связываете?*</td>
                        <td><input type="text" name="nightly_awakening" value="{{old('nightly_awakening')}}"/></td>
                    </tr>
                    <tr>
                        <td>Вы храпите?*</td>
                        <td><input type="checkbox" name="snores" value="{{old('snores')}}"/></td>
                    </tr>
                    <tr>
                        <td>Опишите Ваш режим дня: когда встаёте, что делаете после пробуждения, чем занимаетесь в течение дня, когда самый тяжёлый период дня, когда ужинаете, когда ложитесь спать?*</td>
                        <td><input type="text" name="daily_routine" value="{{old('daily_routine')}}"/></td>
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
                        <td><input type="text" name="med_question_1" value="{{old('med_question_1')}}"/></td>
                    </tr>
                    <tr><td colspan="2" align="center">Операции</td></tr>
                    <tr>
                        <td>Были ли операции (в каком году, в связи с чем)?</td>
                        <td><input type="text" name="med_question_2" value="{{old('med_question_2')}}"/></td>
                    </tr>
                    <tr><td colspan="2">Были ли у Вас удалены?</td></tr>
                    <tr>
                        <td>аденоиды, гланды</td>
                        <td><input type="checkbox" name="med_question_3" value="{{old('med_question_3')}}"/></td>
                    </tr>
                    <tr>
                        <td>апендикс</td>
                        <td><input type="checkbox" name="med_question_4" value="{{old('med_question_4')}}"/></td>
                    </tr>
                    <tr>
                        <td>желчный пузырь</td>
                        <td><input type="checkbox" name="med_question_5" value="{{old('med_question_5')}}"/></td>
                    </tr>
                    <tr>
                        <td>матка, яичники</td>
                        <td><input type="checkbox" name="med_question_6" value="{{old('med_question_6')}}"/></td>
                    </tr>
                    <tr>
                        <td>кисты</td>
                        <td><input type="checkbox" name="med_question_7" value="{{old('med_question_7')}}"/></td>
                    </tr>
                    <tr>
                        <td>другое</td>
                        <td><input type="text" name="med_question_8" value="{{old('med_question_8')}}"/></td>
                    </tr>
                    <tr>
                        <td>Жалобы на данный момент (с указанием когда впервые появилась жалоба)? С чем Вы связываете появление жалобы? Как лечились? Что помогало, что нет?</td>
                        <td><input type="text" name="med_question_9" value="{{old('med_question_9')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли боли (где, какие, с чем связаны, характер боли, продолжительность и интенсивность, что предпринимаете?)</td>
                        <td><input type="text" name="med_question_10" value="{{old('med_question_10')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли усталость, разбитость (Когда? Чем проявляется?)</td>
                        <td><input type="text" name="med_question_11" value="{{old('med_question_11')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли аллергии на лекарства, материалы, животных, сезонная аллергия? Если есть, укажите на что и когда появилась.</td>
                        <td><input type="text" name="med_question_12" value="{{old('med_question_12')}}"/></td>
                    </tr>
                    <tr>
                        <td>Склонны ли вы к респираторным заболеваниям?</td>
                        <td><input type="text" name="med_question_13" value="{{old('med_question_13')}}"/></td>
                    </tr>
                    <tr>
                        <td>Болеете с повышением температуры тела?</td>
                        <td><input type="text" name="med_question_14" value="{{old('med_question_14')}}"/></td>
                    </tr>
                    <tr>
                        <td>Сколько дней?</td>
                        <td><input type="text" name="med_question_15" value="{{old('med_question_15')}}"/></td>
                    </tr>
                    <tr>
                        <td>Чем обычно лечитесь?</td>
                        <td><input type="text" name="med_question_16" value="{{old('med_question_16')}}"/></td>
                    </tr>
                    <tr>
                        <td>Как часто простуда переходит в более тяжелые формы?</td>
                        <td><input type="text" name="med_question_17" value="{{old('med_question_17')}}"/></td>
                    </tr>
                    <tr>
                        <td>Когда последний раз Вы принимали антибиотики?</td>
                        <td><input type="text" name="med_question_18" value="{{old('med_question_18')}}"/></td>
                    </tr>
                    <tr>
                        <td>Сколько раз за последний год вы принимали антибиотики?</td>
                        <td><input type="text" name="med_question_19" value="{{old('med_question_19')}}"/></td>
                    </tr>
                    <tr>
                        <td>Состояние кожи (угревая сыпь, прыщи, сухость, дряблость или отсутсвие тонуса, шелушения, пигментация, сосудистые звёздочки)</td>
                        <td><input type="text" name="med_question_20" value="{{old('med_question_20')}}"/></td>
                    </tr>
                    <tr>
                        <td>Состояние волос (ломкость, сухость, выпадение, седина)</td>
                        <td><input type="text" name="med_question_21" value="{{old('med_question_21')}}"/></td>
                    </tr>
                    <tr>
                        <td>Состояние ногтей (ломкость, есть ли белые пятна, полоски, слоятся ли?)</td>
                        <td><input type="text" name="med_question_22" value="{{old('med_question_22')}}"/></td>
                    </tr>
                    <tr>
                        <td>Налет на языке</td>
                        <td><input type="text" name="med_question_23" value="{{old('med_question_23')}}"/></td>
                    </tr>
                    <tr>
                        <td>Изжога, отрыжка, тошнота, рвота</td>
                        <td><input type="text" name="med_question_24" value="{{old('med_question_24')}}"/></td>
                    </tr>
                    <tr>
                        <td>Метеоризм (Излишнее образование и отхождение газов): как часто, в какое время суток, после какой еды, через какое время после приема пищи, сопровождается ли болями, ечть ли запах?</td>
                        <td><input type="text" name="med_question_25" value="{{old('med_question_25')}}"/></td>
                    </tr>
                    <tr>
                        <td>Боли после еды (после какой, через какое время, какая боль, как быстро проходит, что предпринимаете)</td>
                        <td><input type="text" name="med_question_26" value="{{old('med_question_26')}}"/></td>
                    </tr>
                    <tr>
                        <td>Как часто происходит опорожнение кишечника (как часто ходите в туалет, в одно ли время)?</td>
                        <td><input type="text" name="med_question_27" value="{{old('med_question_27')}}"/></td>
                    </tr>
                    <tr>
                        <td>Бывает ли у Вас запор?*</td>
                        <td><input type="text" name="med_question_28" value="{{old('med_question_28')}}"/></td>
                    </tr>
                    <tr>
                        <td>Как часто, с чем связано?</td>
                        <td><input type="text" name="med_question_29" value="{{old('med_question_29')}}"/></td>
                    </tr>
                    <tr>
                        <td>Бывает ли у Вас диарея?*</td>
                        <td><input type="text" name="med_question_30" value="{{old('med_question_30')}}"/></td>
                    </tr>
                    <tr>
                        <td>Как часто? Какие факторы влияют?</td>
                        <td><input type="text" name="med_question_31" value="{{old('med_question_31')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли проблемы со стороны мочевыделительной системы (учащенные или редкие мочеиспускания)?*</td>
                        <td><input type="text" name="med_question_32" value="{{old('med_question_32')}}"/></td>
                    </tr>
                    <tr>
                        <td>Дискомфорт при мочеиспускании?*</td>
                        <td><input type="text" name="med_question_33" value="{{old('med_question_33')}}"/></td>
                    </tr>
                    <tr>
                        <td>Ходите ли в туалет ночью?*</td>
                        <td><input type="text" name="med_question_34" value="{{old('med_question_34')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли склонность к отечности? Когда появляются отёки (утро/вечер)? С чем связаны? Есть ли связь с питанием?*</td>
                        <td><input type="text" name="med_question_35" value="{{old('med_question_35')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли жалобы и проблемы со стороны сердечно-сосудистой системы (боли с грудиной, одышка, повышение давления)?*</td>
                        <td><input type="text" name="med_question_36" value="{{old('med_question_36')}}"/></td>
                    </tr>
                    <tr>
                        <td>ваше стандартное давление?*</td>
                        <td><input type="text" name="med_question_37" value="{{old('med_question_37')}}"/></td>
                    </tr>
                    <tr>
                        <td>Бывают ли головокружения?*</td>
                        <td><input type="text" name="med_question_38" value="{{old('med_question_38')}}"/></td>
                    </tr>
                    <tr>
                        <td>Бывают ли головные боли (как часто, с чем связаны, что происходит до начала головной боли, что предпринимаете, что помогает?)*</td>
                        <td><input type="text" name="med_question_39" value="{{old('med_question_39')}}"/></td>
                    </tr>
                    <tr>
                        <td>Бывают ли чувства беспокойства, тревоги? Как Вы с ними справляетесь?*</td>
                        <td><input type="text" name="med_question_40" value="{{old('med_question_40')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли проблемы с суставами (боли при движении, скованность по утрам или в течение дня)? Были ли травмы?*</td>
                        <td><input type="text" name="med_question_41" value="{{old('med_question_41')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли жалобы со стороны дыхательной системы (кашель, одышка, храп)?*</td>
                        <td><input type="text" name="med_question_42" value="{{old('med_question_42')}}"/></td>
                    </tr>
                    <tr><td colspan="2" align="center">Напишите все принимаемые Вами препараты и БАДы с дозой и длительностью приема. укажите, кто их назначил (если врач, то какой? Нутрициолог или самостоятельно)</td></tr>
                    <tr>
                        <td>Лекарства</td>
                        <td><input type="text" name="med_question_43" value="{{old('med_question_43')}}"/></td>
                    </tr>
                    <tr>
                        <td>Бады</td>
                        <td><input type="text" name="med_question_44" value="{{old('med_question_44')}}"/></td>
                    </tr>
                    <tr>
                        <td>травы</td>
                        <td><input type="text" name="med_question_45" value="{{old('med_question_45')}}"/></td>
                    </tr>
                    <tr>
                        <td>гомеопатия</td>
                        <td><input type="text" name="med_question_46" value="{{old('med_question_46')}}"/></td>
                    </tr>
                    <tr>
                        <td>Другое</td>
                        <td><input type="text" name="med_question_47" value="{{old('med_question_47')}}"/></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Семейная история</strong></td></tr>
                    <tr><td colspan="2">Какими заболеваниями болели/ болеют ваши родственники</td></tr>
                    <tr>
                        <td>Мать</td>
                        <td><input type="text" name="mother" value="{{old('mother')}}"/></td>
                    </tr>
                    <tr>
                        <td>Отец</td>
                        <td><input type="text" name="father" value="{{old('father')}}"/></td>
                    </tr>
                    <tr>
                        <td>Бабушка</td>
                        <td><input type="text" name="grandma" value="{{old('grandma')}}"/></td>
                    </tr>
                    <tr>
                        <td>Дедушка</td>
                        <td><input type="text" name="grandpa" value="{{old('grandpa')}}"/></td>
                    </tr>
                    <tr>
                        <td>Братья</td>
                        <td><input type="text" name="brothers" value="{{old('brothers')}}"/></td>
                    </tr>
                    <tr>
                        <td>Сёстры</td>
                        <td><input type="text" name="sisters" value="{{old('sisters')}}"/></td>
                    </tr>
                    <tr><td colspan="2" align="center"><strong>Здоровье женщины</strong></td></tr>
                    <tr>
                        <td>Если были: как протекала беременность/роды?</td>
                        <td><input type="text" name="woman_question_1" value="{{old('woman_question_1')}}"/></td>
                    </tr>
                    <tr>
                        <td>Были ли сложности с зачатием?</td>
                        <td><input type="text" name="woman_question_2" value="{{old('woman_question_2')}}"/></td>
                    </tr>
                    <tr>
                        <td>Какой метод контрацепции Вы используете?</td>
                        <td><input type="text" name="woman_question_3" value="{{old('woman_question_3')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть вероятность, что Вы беременны в данный момент?</td>
                        <td><input type="text" name="woman_question_4" value="{{old('woman_question_4')}}"/></td>
                    </tr>
                    <tr>
                        <td>Регулярный цикл?</td>
                        <td><input type="text" name="woman_question_5" value="{{old('woman_question_5')}}"/></td>
                    </tr>
                    <tr>
                        <td>Есть ли мажущие выделения до/после или в середине цикла?</td>
                        <td><input type="text" name="woman_question_6" value="{{old('woman_question_6')}}"/></td>
                    </tr>
                    <tr>
                        <td>На сколько обильные кровотечения?</td>
                        <td><input type="text" name="woman_question_7" value="{{old('woman_question_7')}}"/></td>
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
                        <td><input type="text" name="woman_question_10" value="{{old('woman_question_10')}}"/></td>
                    </tr>
                    <tr>
                        <td>Подвержены ли Вы ПМС? Как это проявляется?</td>
                        <td><input type="text" name="woman_question_11" value="{{old('woman_question_11')}}"/></td>
                    </tr>
                    <tr>
                        <td>Наступила ли у Вас менопауза? В каком возрасте?</td>
                        <td><input type="text" name="woman_question_12" value="{{old('woman_question_12')}}"/></td>
                    </tr>
                    <tr>
                        <td>Присоедините результаты анализов и исследований, а так же выписки (если есть) за последние полгода.</td>
                        <td><input type="file" name="analysis_results"/></td>
                    </tr>
                    <tr>
                        <td>Дополнительная информация которую Вы хотите мне сообщить</td>
                        <td><input type="text" name="extra_info" value="{{old('extra_info')}}"/></td>
                    </tr>
                </table>
                <input class="btn btn-sm btn-outline-danger" type="submit" name="submit" value="отправить"/>
            </form>
       </div>     
</div>
@endsection
