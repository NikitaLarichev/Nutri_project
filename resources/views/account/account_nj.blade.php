@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')


<div class="container my-4">
@foreach($nutritionJournalInfoArr as $nutritionJournalInfo)
       <form method="post" action={{route('nj_save')}}>
       @csrf
       <input type="hidden" name="date" value="{{$nutritionJournalInfo->date}}"/>
       <h4>{{$nutritionJournalInfo->date}}</h4>
              <table class="c1 nj">
                     <colgroup>
                            <col style="width: 10%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                            <col style="width: 15%">
                     </colgroup>
                     <tr>
                            <td>Время пробуждения</td>
                            <td><textarea rows='4' type="text" name="risingTime">{{$nutritionJournalInfo->risingTime}}</textarea></td>
                            <td>Качество сна</td>
                            <td><textarea rows='4' type="text" name="sleepQuality">{{$nutritionJournalInfo->sleepQuality}}</textarea></td>
                            <td>Физическая активность за день (зал, тренировки или количество шагов)</td>
                            <td><textarea rows='4' type="text" name="dailyPhysicActivity">{{$nutritionJournalInfo->dailyPhysicActivity}}</textarea></td>
                            <td>Какие измненения вы замечали в вашем настроении или физическом состоянии?</td>
                            <td><textarea rows='4' type="text" name="conditionChanges">{{$nutritionJournalInfo->conditionChanges}}</textarea></td>
                     </tr>
                     <tr>
                            <td>День недели</td>
                            <td><div>{{$week[date('w', strtotime($nutritionJournalInfo->date))]}}</div></td>
                            <td>Легко ли было вставать утром</td>
                            <td><textarea rows='4' type="text" name="wasRisingEasy">{{$nutritionJournalInfo->wasRisingEasy}}</textarea></td>
                            <td>Уровень энергии в течение дня</td>
                            <td><textarea rows='4' type="text" name="dailyEnergyLevel">{{$nutritionJournalInfo->dailyEnergyLevel}}</textarea></td>
                            <td>Самые трудные моменты сегодня</td>
                            <td><textarea rows='4' type="text" name="hardestMoment">{{$nutritionJournalInfo->hardestMoment}}</textarea></td>
                     </tr>
                     <tr>
                            <td>Время сна</td>
                            <td><textarea rows='4' type="text" name="sleepDuration">{{$nutritionJournalInfo->sleepDuration}}</textarea></td>
                            <td>Время отхода ко сну</td>
                            <td><textarea rows='4' type="text" name="bedtime">{{$nutritionJournalInfo->bedtime}}</textarea></td>
                            <td>Объём воды</td>
                            <td><textarea rows='4' type="text" name="waterVolume">{{$nutritionJournalInfo->waterVolume}}</textarea></td>
                            <td>Ваши победы сегодня</td>
                            <td><textarea rows='4' type="text" name="dailyPersonalVictories">{{$nutritionJournalInfo->dailyPersonalVictories}}</textarea></td>
                     </tr>
                     <tr>
                            <th></th>
                            <th>Блюда/продукты</th>
                            <th>Время приема пищи</th>
                            <th>Шкала голода (1 - 10)</th>
                            <th>Я ем потому что (голод, скучно, режим, за компанию, нужно)</th>
                            <th>Чувство сразу после еды (вздутие, тяжесть, боль, газы, сила, энергия)</th>
                            <th>Чувство через 2-3 часа после еды (вздутие, тяжесть, боль, газы, сила, энергия)</th>
                            <th>Другие примечания</th>
                     </tr>
                     <tr>
                            <th>Завтрак</th>
                            <td><textarea rows='4' type="text" name="b_dish">
                                   @if(@isset($nutritionJournalInfo->Breakfast->b_dish)){{$nutritionJournalInfo->Breakfast->b_dish}}@endif

                            </textarea></td>
                            <td><textarea rows='4' type="text" name="b_mealtime">@if(@isset($nutritionJournalInfo->Breakfast->b_mealtime)){{$nutritionJournalInfo->Breakfast->b_mealtime}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="b_hungerScale">@if(@isset($nutritionJournalInfo->Breakfast->b_hungerScale)){{$nutritionJournalInfo->Breakfast->b_hungerScale}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="b_iEatBecause">@if(@isset($nutritionJournalInfo->Breakfast->b_iEatBecause)){{$nutritionJournalInfo->Breakfast->b_iEatBecause}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="b_afterEatingFeeling">@if(@isset($nutritionJournalInfo->Breakfast->b_afterEatingFeeling)){{$nutritionJournalInfo->Breakfast->b_afterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="b_someHoursAfterEatingFeeling">@if(@isset($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling)){{$nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="b_anotherNote">@if(@isset($nutritionJournalInfo->Breakfast->b_anotherNote)){{$nutritionJournalInfo->Breakfast->b_anotherNote}}@endif</textarea></td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><textarea rows='4' type="text" name="fl_dish">@if(@isset($nutritionJournalInfo->FirstLunch->fl_dish)){{$nutritionJournalInfo->FirstLunch->fl_dish}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="fl_mealtime">@if(@isset($nutritionJournalInfo->FirstLunch->fl_mealtime)){{$nutritionJournalInfo->FirstLunch->fl_mealtime}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="fl_hungerScale">@if(@isset($nutritionJournalInfo->FirstLunch->fl_hungerScale)){{$nutritionJournalInfo->FirstLunch->fl_hungerScale}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="fl_iEatBecause">@if(@isset($nutritionJournalInfo->FirstLunch->fl_iEatBecause)){{$nutritionJournalInfo->FirstLunch->fl_iEatBecause}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="fl_afterEatingFeeling">@if(@isset($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling)){{$nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="fl_someHoursAfterEatingFeeling">@if(@isset($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling)){{$nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="fl_anotherNote">@if(@isset($nutritionJournalInfo->FirstLunch->fl_anotherNote)){{$nutritionJournalInfo->FirstLunch->fl_anotherNote}}@endif</textarea></td>
                     </tr>
                     <tr>
                            <th>Обед</th>
                            <td><textarea rows='4' type="text" name="d_dish">@if(@isset($nutritionJournalInfo->Dinner->d_dish)){{$nutritionJournalInfo->Dinner->d_dish}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="d_mealtime">@if(@isset($nutritionJournalInfo->Dinner->d_mealtime)){{$nutritionJournalInfo->Dinner->d_mealtime}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="d_hungerScale">@if(@isset($nutritionJournalInfo->Dinner->d_hungerScale)){{$nutritionJournalInfo->Dinner->d_hungerScale}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="d_iEatBecause">@if(@isset($nutritionJournalInfo->Dinner->d_iEatBecause)){{$nutritionJournalInfo->Dinner->d_iEatBecause}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="d_afterEatingFeeling">@if(@isset($nutritionJournalInfo->Dinner->d_afterEatingFeeling)){{$nutritionJournalInfo->Dinner->d_afterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="d_someHoursAfterEatingFeeling">@if(@isset($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling)){{$nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="d_anotherNote">@if(@isset($nutritionJournalInfo->Dinner->d_anotherNote)){{$nutritionJournalInfo->Dinner->d_anotherNote}}@endif</textarea></td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><textarea rows='4' type="text" name="sl_dish">@if(@isset($nutritionJournalInfo->SecondLunch->sl_dish)){{$nutritionJournalInfo->SecondLunch->sl_dish}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="sl_mealtime">@if(@isset($nutritionJournalInfo->SecondLunch->sl_mealtime)){{$nutritionJournalInfo->SecondLunch->sl_mealtime}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="sl_hungerScale">@if(@isset($nutritionJournalInfo->SecondLunch->sl_hungerScale)){{$nutritionJournalInfo->SecondLunch->sl_hungerScale}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="sl_iEatBecause">@if(@isset($nutritionJournalInfo->SecondLunch->sl_iEatBecause)){{$nutritionJournalInfo->SecondLunch->sl_iEatBecause}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="sl_afterEatingFeeling">@if(@isset($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling)){{$nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="sl_someHoursAfterEatingFeeling">@if(@isset($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling)){{$nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="sl_anotherNote" >@if(@isset($nutritionJournalInfo->SecondLunch->sl_anotherNote)){{$nutritionJournalInfo->SecondLunch->sl_anotherNote}}@endif</textarea></td>
                     </tr>
                     <tr>
                            <th>Ужин</th>
                            <td><textarea rows='4' type="text" name="s_dish" >@if(@isset($nutritionJournalInfo->Supper->s_dish)){{$nutritionJournalInfo->Supper->s_dish}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="s_mealtime" >@if(@isset($nutritionJournalInfo->Supper->s_mealtime)){{$nutritionJournalInfo->Supper->s_mealtime}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="s_hungerScale" >@if(@isset($nutritionJournalInfo->Supper->s_hungerScale)){{$nutritionJournalInfo->Supper->s_hungerScale}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="s_iEatBecause" >@if(@isset($nutritionJournalInfo->Supper->s_iEatBecause)){{$nutritionJournalInfo->Supper->s_iEatBecause}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="s_afterEatingFeeling" >@if(@isset($nutritionJournalInfo->Supper->s_afterEatingFeeling)){{$nutritionJournalInfo->Supper->s_afterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="s_someHoursAfterEatingFeeling" >@if(@isset($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling)){{$nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="s_anotherNote" >@if(@isset($nutritionJournalInfo->Supper->s_anotherNote)){{$nutritionJournalInfo->Supper->s_anotherNote}}@endif</textarea></td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><textarea rows='4' type="text" name="tl_dish" >@if(@isset($nutritionJournalInfo->ThirdLunch->tl_dish)){{$nutritionJournalInfo->ThirdLunch->tl_dish}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="tl_mealtime" >@if(@isset($nutritionJournalInfo->ThirdLunch->tl_mealtime)){{$nutritionJournalInfo->ThirdLunch->tl_mealtime}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="tl_hungerScale">@if(@isset($nutritionJournalInfo->ThirdLunch->tl_hungerScale)){{$nutritionJournalInfo->ThirdLunch->tl_hungerScale}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="tl_iEatBecause" >@if(@isset($nutritionJournalInfo->ThirdLunch->tl_iEatBecause)){{$nutritionJournalInfo->ThirdLunch->tl_iEatBecause}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="tl_afterEatingFeeling">@if(@isset($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling)){{$nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="tl_someHoursAfterEatingFeeling">@if(@isset($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling)){{$nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling}}@endif</textarea></td>
                            <td><textarea rows='4' type="text" name="tl_anotherNote">@if(@isset($nutritionJournalInfo->ThirdLunch->tl_anotherNote)){{$nutritionJournalInfo->ThirdLunch->tl_anotherNote}}@endif</textarea></td>
                     </tr>
              </table>
              <input class="button-outline c3 my-4 px-3 py-2" type="submit" value="отправить"/>
       </form>
@endforeach
<!-- <script>
       let dayOfweek = document.getElementById("dayOfWeek");
       let date = document.getElementById("date");
       var week = ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"];
       if(date.value != null){
       dayOfweek.innerText = week[date.valueAsDate.getUTCDay()];
       }
       date.onchange = function(){
       var d = date.valueAsDate.getUTCDay()
       dayOfweek.innerText = week[d];
       }
</script> -->
</div>
@endsection
