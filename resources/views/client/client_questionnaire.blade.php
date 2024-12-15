@extends('layouts.client_menu', ['client'=>$client])
@section('menu')
@parent
@endsection
@section('client_content')
<div class="container mt-4">
       <div class="container">
            <table class="c1">
                <tr>
                    <td colspan="2" align="center"><strong>Анкета состояния здоровья, стиль питания и образ жизни</strong></td>
                </tr>
                <tr class="anketa">
                    <td>Дата заполнения</td>
                    <td><div>@if(@isset($clientGeneralData->date_of_completion)){{$clientGeneralData->date_of_completion}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>ФИО</td>
                    <td><div>@if(@isset($clientGeneralData->fio)){{$clientGeneralData->fio}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Дата рождения, возраст</td>
                    <td><div>@if(@isset($clientGeneralData->age)){{$clientGeneralData->age}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Место жительства (город)</td>
                    <td><div>@if(@isset($clientGeneralData->city)){{$clientGeneralData->city}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Телефон</td>
                    <td><div>@if(@isset($clientGeneralData->phone)){{$clientGeneralData->phone}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Адрес электронной почты</td>
                    <td><div>@if(@isset($clientGeneralData->email)){{$clientGeneralData->email}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Причины обращения за консультацией (перечислить)</td>
                    <td><div>@if(@isset($clientGeneralData->reasons_for_consultation)){{$clientGeneralData->reasons_for_consultation}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Ваши цели и ожидания от работы? Какие результаты Вы хотели бы получить?</td>
                    <td><div>@if(@isset($clientGeneralData->desired_results)){{$clientGeneralData->desired_results}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Рост (см)</td>
                    <td><div>@if(@isset($clientGeneralData->height)){{$clientGeneralData-height}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Вес (кг)</td>
                    <td><div>@if(@isset($clientGeneralData->weight)){{$clientGeneralData->weight}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Какие были колебания веса? С чем, по Вашему мнению, ни были связаны?</td>
                    <td><div>@if(@isset($clientGeneralData->weight_fluctuations)){{$clientGeneralData->weight_fluctuations}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Окружность талии (см)</td>
                    <td><div>@if(@isset($clientGeneralData->waist_circumference)){{$clientGeneralData->waist_circumference}}@endif</div></td>
                </tr>
                <tr>
                    <td colspan="2">Вы бы хотели:</td>
                </tr>
                <tr class="anketa">            
                    <td>
                        <ol>
                            <li>набрать вес</li>
                            <li>снизить вес</li>
                            <li>остаться в прежнем весе</li>
                        </ol>
                    </td>
                    <td>
                        <ul>
                            <li><div>@if(@isset($clientGeneralData->gain_weight)){{$clientGeneralData->gain_weight}}@endif</div></li>
                            <li><div>@if(@isset($clientGeneralData->lose_weight)){{$clientGeneralData->lose_weight}}@endif</div></li>
                            <li><div>@if(@isset($clientGeneralData->save_weight)){{$clientGeneralData->save_weight}}@endif</div></li>
                        </ul>
                    </td>
                </tr> 
                <tr class="anketa">
                    <td>Желаемый вес (кг)</td>
                    <td><div>@if(@isset($clientGeneralData->desire_weight)){{$clientGeneralData->desire_weight}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center"><strong>Семейное положение</strong></td></tr>
                <tr class="anketa">
                    <td>Семейное положение</td>
                    <td><div>@if(@isset($clientFamilyData->marital_status)){{$clientFamilyData->marital_status}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>У вас есть дети?</td>
                    <td><div>@if(@isset($clientFamilyData->children)){{$clientFamilyData->children}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Возраст детей</td>
                    <td><div>@if(@isset($clientFamilyData->children_age)){{$clientFamilyData->children_age}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center"><strong>Работа, хобби, интересы</strong></td></tr>
                <tr class="anketa">
                    <td>Профессия и вид деятельности на данный момент</td>
                    <td><div>@if(@isset($clientWorkData->profession)){{$clientWorkData->profession}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Любите ли вы свою работу?</td>
                    <td><div>@if(@isset($clientWorkData->do_like_your_working)){{$clientWorkData->do_like_your_working}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Опишите график и характер работы</td>
                    <td><div>@if(@isset($clientWorkData->work_character)){{$clientWorkData->work_character}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Где работали в течение жизни, какиу вредные воздействия испытывали на себе в процессе профессиональной деятельности?</td>
                    <td><div>@if(@isset($clientWorkData->working_history)){{$clientWorkData->working_history}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть у Вас хобби/увлечения</td>
                    <td><div>@if(@isset($clientWorkData->hobby)){{$clientWorkData->hobby}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Как вы обычно отдыхаете?</td>
                    <td><div>@if(@isset($clientWorkData->rest)){{$clientWorkData->rest}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Занимаетесь спортом? Каким и как часто?</td>
                    <td><div>@if(@isset($clientWorkData->sport)){{$clientWorkData->sport}}@endif</div></td>
                </tr>
                <tr>
                    <td colspan="2">Сколько времени проводите:</td>
                </tr>
                <tr class="anketa">
                    <td>1. за рулём</td>
                    <td><div>@if(@isset($clientWorkData->driving_time)){{$clientWorkData->driving_time}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>2. в транспорте</td>
                    <td><div>@if(@isset($clientWorkData->transport_time)){{$clientWorkData->transport_time}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>3. перед компьютером</td>
                    <td><div>@if(@isset($clientWorkData->pc_time)){{$clientWorkData->pc_time}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>4. на работе</td>
                    <td><div>@if(@isset($clientWorkData->working_time)){{$clientWorkData->working_time}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>5. на прогулке</td>
                    <td><div>@if(@isset($clientWorkData->walking_time)){{$clientWorkData->walking_time}}@endif</div></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><strong>Вредные привычки</strong></td>
                </tr>
                <tr class="anketa">
                    <td>Вы курите?</td>
                    <td><div>@if(@isset($clientBadHabitsData->smoking)){{$clientBadHabitsData->smoking}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Сколько сигарет в день?</td>
                    <td><div>@if(@isset($clientBadHabitsData->cigarets_per_day)){{$clientBadHabitsData->cigarets_per_day}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть цель отказаться от курения?</td>
                    <td><div>@if(@isset($clientBadHabitsData->do_you_want_quit_smoking)){{$clientBadHabitsData->do_you_want_quit_smoking}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Вы употребляете алкоголь?</td>
                    <td><div>@if(@isset($clientBadHabitsData->alcohol)){{$clientBadHabitsData->alcohol}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Как часто?</td>
                    <td><div>@if(@isset($clientBadHabitsData->alcohol_how_often)){{$clientBadHabitsData->alcohol_how_often}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Что вы обычно выпиваете?</td>
                    <td><div>@if(@isset($clientBadHabitsData->what_alcohol)){{$clientBadHabitsData->what_alcohol}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли у Вас другие зависимости? Укажите какие именно</td>
                    <td><div>@if(@isset($clientBadHabitsData->another_dependencies)){{$clientBadHabitsData->another_dependencies}}@endif</div></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><strong>Пищевые привычки</strong></td>
                </tr>
                <tr class="anketa">
                    <td>Сколько у Вас основных приёмов пищи в день?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->main_meals_amount)){{$clientFoodHabitsData->main_meals_amount}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Сколько перекусов?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->meals_amount)){{$clientFoodHabitsData->meals_amount}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли ограничения по еде?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->food_limit)){{$clientFoodHabitsData->food_limit}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Непереносимость продуктов</td>
                    <td><div>@if(@isset($clientFoodHabitsData->food_intolerance)){{$clientFoodHabitsData->food_intolerance}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Аллергия на продукты</td>
                    <td><div>@if(@isset($clientFoodHabitsData->food_allergy)){{$clientFoodHabitsData->food_allergy}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Какие жидкости вы пьёте?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->what_drink)){{$clientFoodHabitsData->what_drink}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Сколько чашек кофе и чая выпиваете в день?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->cups_of_tea_coffee)){{$clientFoodHabitsData->cups_of_tea_coffee}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Какие жиры и масла используете для приготовления пищи?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->cooking_oil)){{$clientFoodHabitsData->cooking_oil}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Какие источники сахара есть в вашем рационе?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->sugar_source)){{$clientFoodHabitsData->sugar_source}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Какая ваша любимая еда?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->favorite_food)){{$clientFoodHabitsData->favorite_food}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли тяга к определенным продуктам?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->food_cravings)){{$clientFoodHabitsData->food_cravings}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Избигаете ли вы какой то еды? Почему?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->food_avoid)){{$clientFoodHabitsData->food_avoid}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Придерживались ли Вы ранее каких либо диет или принципов питания? Если да, то каких, когда и какие были результаты?</td>
                    <td><div>@if(@isset($clientFoodHabitsData->diet)){{$clientFoodHabitsData->diet}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center"><strong>Cон</strong></td></tr>
                <tr class="anketa">
                    <td>Сколько часов Вы спите?</td>
                    <td><div>@if(@isset($clientDreamData->bedtime)){{$clientDreamData->bedtime}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Во сколько встаёте?</td>
                    <td><div>@if(@isset($clientDreamData->rising_time)){{$clientDreamData->rising_time}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Чувствуете себя отдохнувшим утром?</td>
                    <td><div>@if(@isset($clientDreamData->do_you_feel_rest)){{$clientDreamData->do_you_feel_rest}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Во сколько вы ложитесь?</td>
                    <td><div>@if(@isset($clientDreamData->asleep_time)){{$clientDreamData->asleep_time}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Легко засыпаете?</td>
                    <td><div>@if(@isset($clientDreamData->doy_you_fall_asleep_easly)){{$clientDreamData->doy_you_fall_asleep_easly}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ночные пробуждения? Как часто? С чем связываете?</td>
                    <td><div>@if(@isset($clientDreamData->nightly_awakening)){{$clientDreamData->nightly_awakening}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Вы храпите?</td>
                    <td><div>@if(@isset($clientDreamData->snores)){{$clientDreamData->snores}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Опишите Ваш режим дня: когда встаёте, что делаете после пробуждения, чем занимаетесь в течение дня, когда самый тяжёлый период дня, когда ужинаете, когда ложитесь спать?*</td>
                    <td><div>@if(@isset($clientDreamData->daily_routine)){{$clientDreamData->daily_routine}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center"><strong>Что вы делаете в данный момент для поддержания здоровья?</strong></td></tr>
                <tr class="anketa">
                    <td>Массаж</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->massage)){{$clientMedicineHistoryData->massage}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Остеопат</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->osteopath)){{$clientMedicineHistoryData->osteopath}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Питание</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->nutrition)){{$clientMedicineHistoryData->nutrition}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Добавки</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->supplements)){{$clientMedicineHistoryData->supplements}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Спорт</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->sport)){{$clientMedicineHistoryData->sport}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Травы</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->herb)){{$clientMedicineHistoryData->herb}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Лекарства</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->drugs)){{$clientMedicineHistoryData->drugs}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Другое</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->another)){{$clientMedicineHistoryData->another}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center"><strong>Медицинская история</strong></td></tr>
                <tr class="anketa">
                    <td>Перечислите хронические заболевания в хронологичесом порядке (подтверждённые диагнозы). Укажите год начала заболевания, кто поставид диагноз и врезультате каких исследований? Как лечили? Как часто происходят обострения? Каково состояние на данный момент?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_1)){{$clientMedicineHistoryData->med_question_1}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center">Операции</td></tr>
                <tr class="anketa">
                    <td>Были ли операции (в каком году, в связи с чем)?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_2)){{$clientMedicineHistoryData->med_question_2}}@endif</div></td>
                </tr>
                <tr><td colspan="2">Были ли у Вас удалены?</td></tr>
                <tr class="anketa">
                    <td>аденоиды, гланды</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_3)){{$clientMedicineHistoryData->med_question_3}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>апендикс</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_4)){{$clientMedicineHistoryData->med_question_4}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>желчный пузырь</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_5)){{$clientMedicineHistoryData->med_question_5}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>матка, яичники</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_6)){{$clientMedicineHistoryData->med_question_6}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>кисты</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_7)){{$clientMedicineHistoryData->med_question_7}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>другое</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_8)){{$clientMedicineHistoryData->med_question_8}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Жалобы на данный момент (с указанием когда впервые появилась жалоба)? С чем Вы связываете появление жалобы? Как лечились? Что помогало, что нет?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_9)){{$clientMedicineHistoryData->med_question_9}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли боли (где, какие, с чем связаны, характер боли, продолжительность и интенсивность, что предпринимаете?)</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_10)){{$clientMedicineHistoryData->med_question_10}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли усталость, разбитость (Когда? Чем проявляется?)</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_11)){{$clientMedicineHistoryData->med_question_11}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли аллергии на лекарства, материалы, животных, сезонная аллергия? Если есть, укажите на что и когда появилась.</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_12)){{$clientMedicineHistoryData->med_question_12}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Склонны ли вы к респираторным заболеваниям?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_13)){{$clientMedicineHistoryData->med_question_13}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Болеете с повышением температуры тела?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_14)){{$clientMedicineHistoryData->med_question_14}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Сколько дней?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_15)){{$clientMedicineHistoryData->med_question_15}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Чем обычно лечитесь?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_16)){{$clientMedicineHistoryData->med_question_16}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Как часто простуда переходит в более тяжелые формы?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_17)){{$clientMedicineHistoryData->med_question_17}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Когда последний раз Вы принимали антибиотики?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_18)){{$clientMedicineHistoryData->med_question_18}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Сколько раз за последний год вы принимали антибиотики?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_19)){{$clientMedicineHistoryData->med_question_19}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Состояние кожи (угревая сыпь, прыщи, сухость, дряблость или отсутсвие тонуса, шелушения, пигментация, сосудистые звёздочки)</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_20)){{$clientMedicineHistoryData->med_question_20}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Состояние волос (ломкость, сухость, выпадение, седина)</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_21)){{$clientMedicineHistoryData->med_question_21}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Состояние ногтей (ломкость, есть ли белые пятна, полоски, слоятся ли?)</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_22)){{$clientMedicineHistoryData->med_question_22}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Налет на языке</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_23)){{$clientMedicineHistoryData->med_question_23}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Изжога, отрыжка, тошнота, рвота</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_24)){{$clientMedicineHistoryData->med_question_24}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Метеоризм (Излишнее образование и отхождение газов): как часто, в какое время суток, после какой еды, через какое время после приема пищи, сопровождается ли болями, ечть ли запах?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_25)){{$clientMedicineHistoryData->med_question_25}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Боли после еды (после какой, через какое время, какая боль, как быстро проходит, что предпринимаете)</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_26)){{$clientMedicineHistoryData->med_question_26}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Как часто происходит опорожнение кишечника (как часто ходите в туалет, в одно ли время)?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_27)){{$clientMedicineHistoryData->med_question_27}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Бывает ли у Вас запор?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_28)){{$clientMedicineHistoryData->med_question_28}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Как часто, с чем связано?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_29)){{$clientMedicineHistoryData->med_question_29}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Бывает ли у Вас диарея?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_30)){{$clientMedicineHistoryData->med_question_30}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Как часто? Какие факторы влияют?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_31)){{$clientMedicineHistoryData->med_question_31}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли проблемы со стороны мочевыделительной системы (учащенные или редкие мочеиспускания)?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_32)){{$clientMedicineHistoryData->med_question_32}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Дискомфорт при мочеиспускании?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_33)){{$clientMedicineHistoryData->med_question_33}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Ходите ли в туалет ночью?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_34)){{$clientMedicineHistoryData->med_question_34}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли склонность к отечности? Когда появляются отёки (утро/вечер)? С чем связаны? Есть ли связь с питанием?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_35)){{$clientMedicineHistoryData->med_question_35}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли жалобы и проблемы со стороны сердечно-сосудистой системы (боли с грудиной, одышка, повышение давления)?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_36)){{$clientMedicineHistoryData->med_question_36}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>ваше стандартное давление?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_37)){{$clientMedicineHistoryData->med_question_37}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Бывают ли головокружения?*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_38)){{$clientMedicineHistoryData->med_question_38}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Бывают ли головные боли (как часто, с чем связаны, что происходит до начала головной боли, что предпринимаете, что помогает?)*</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_39)){{$clientMedicineHistoryData->med_question_39}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Бывают ли чувства беспокойства, тревоги? Как Вы с ними справляетесь?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_40)){{$clientMedicineHistoryData->med_question_40}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли проблемы с суставами (боли при движении, скованность по утрам или в течение дня)? Были ли травмы?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_41)){{$clientMedicineHistoryData->med_question_41}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли жалобы со стороны дыхательной системы (кашель, одышка, храп)?</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_42)){{$clientMedicineHistoryData->med_question_42}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center">Напишите все принимаемые Вами препараты и БАДы с дозой и длительностью приема. укажите, кто их назначил (если врач, то какой? Нутрициолог или самостоятельно)</td></tr>
                <tr class="anketa">
                    <td>Лекарства</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_43)){{$clientMedicineHistoryData->med_question_43}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Бады</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_44)){{$clientMedicineHistoryData->med_question_44}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>травы</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_45)){{$clientMedicineHistoryData->med_question_45}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>гомеопатия</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_46)){{$clientMedicineHistoryData->med_question_46}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Другое</td>
                    <td><div>@if(@isset($clientMedicineHistoryData->med_question_47)){{$clientMedicineHistoryData->med_question_47}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center"><strong>Семейная история</strong></td></tr>
                <tr><td colspan="2">Какими заболеваниями болели/ болеют ваши родственники</td></tr>
                <tr class="anketa">
                    <td>Мать</td>
                    <td><div>@if(@isset($clientFamilyHistoryData->mother)){{$clientFamilyHistoryData->mother}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Отец</td>
                    <td><div>@if(@isset($clientFamilyHistoryData->father)){{$clientFamilyHistoryData->father}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Бабушка</td>
                    <td><div>@if(@isset($clientFamilyHistoryData->grandma)){{$clientFamilyHistoryData->grandma}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Дедушка</td>
                    <td><div>@if(@isset($clientFamilyHistoryData->grandpa)){{$clientFamilyHistoryData->grandpa}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Братья</td>
                    <td><div>@if(@isset($clientFamilyHistoryData->brothers)){{$clientFamilyHistoryData->brothers}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Сёстры</td>
                    <td><div>@if(@isset($clientFamilyHistoryData->sisters)){{$clientFamilyHistoryData->sisters}}@endif</div></td>
                </tr>
                <tr><td colspan="2" align="center"><strong>Здоровье женщины</strong></td></tr>
                <tr class="anketa">
                    <td>Если были: как протекала беременность/роды?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_1)){{$clientWomanHealthData->woman_question_1}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Были ли сложности с зачатием?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_2)){{$clientWomanHealthData->woman_question_2}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Какой метод контрацепции Вы используете?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_3)){{$clientWomanHealthData->woman_question_3}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть вероятность, что Вы беременны в данный момент?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_4)){{$clientWomanHealthData->woman_question_4}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Регулярный цикл?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_5)){{$clientWomanHealthData->woman_question_5}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Есть ли мажущие выделения до/после или в середине цикла?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_6)){{$clientWomanHealthData->woman_question_6}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>На сколько обильные кровотечения?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_7)){{$clientWomanHealthData->woman_question_7}}@endif</div></td>
                </tr>
                <tr><td colspan="2">Испытываете ли Вы неприятные симптомы:</td></tr>
                <tr class="anketa">
                    <td>1. тяжесть в груди</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_8)){{$clientWomanHealthData->woman_question_8}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>2. овуляторные боли</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_9)){{$clientWomanHealthData->woman_question_9}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>3. другое</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_10)){{$clientWomanHealthData->woman_question_10}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Подвержены ли Вы ПМС? Как это проявляется?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_11)){{$clientWomanHealthData->woman_question_11}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Наступила ли у Вас менопауза? В каком возрасте?</td>
                    <td><div>@if(@isset($clientWomanHealthData->woman_question_12)){{$clientWomanHealthData->woman_question_12}}@endif</div></td>
                </tr>
                <tr class="anketa">
                    <td>Дополнительная информация которую Вы хотите мне сообщить</td>
                    <td><div>@if(@isset($clientGeneralData->extra_info)){{$clientGeneralData->extra_info}}@endif</div></td>
                </tr>
            </table>
            @livewire('analyzes', ['user_id' => $client->id])
       </div>     
</div>
@endsection