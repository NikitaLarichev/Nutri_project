@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')


<div class="container ms-m15">
@foreach($nutritionJournalInfoArr as $nutritionJournalInfo)
       <form method="post" action={{route('nj_save')}}>
       @csrf
       <div style="align-text:center">{{$nutritionJournalInfo->date}}</div>
       <div style="align-text:center">{{$nutritionJournalInfo->date}}</div>
              <table class="table table-bordered ms-font-medium small">
                     <tr>
                            <th colspan="8"><input type="date" name="date" id="date" value="{{$nutritionJournalInfo->date}}"/></th>
                     </tr>
                     <tr>
                            <td style="width:8%">Время пробуждения</td>
                            <td style="width:8%"><input type="text" name="risingTime" value="{{$nutritionJournalInfo->risingTime}}"/></td>
                            <td style="width:8%">Качество сна</td>
                            <td style="width:8%"><input type="text" name="sleepQuality" value="{{$nutritionJournalInfo->sleepQuality}}"/></td>
                            <td style="width:8%">Физическая активность за день (зал, тренировки или количество шагов)</td>
                            <td style="width:8%"><input type="text" name="dailyPhysicActivity" value="{{$nutritionJournalInfo->dailyPhysicActivity}}"/></td>
                            <td style="width:8%">Какие измненения вы замечали в вашем настроении или физическом состоянии?</td>
                            <td style="width:8%"><input type="text" name="conditionChanges" value="{{$nutritionJournalInfo->conditionChanges}}"/></td>
                     </tr>
                     <tr>
                            <td>День недели</td>
                            <td><input type="text" name="dayofWeek" id="dayOfWeek" value=""/></td>
                            <td>Легко ли было вставать утром</td>
                            <td><input type="text" name="wasRisingEasy" value="{{$nutritionJournalInfo->wasRisingEasy}}"/></td>
                            <td>Уровень энергии в течение дня</td>
                            <td><input type="text" name="dailyEnergyLevel" value="{{$nutritionJournalInfo->dailyEnergyLevel}}"/></td>
                            <td>Самые трудные моменты сегодня</td>
                            <td><input type="text" name="hardestMoment" value="{{$nutritionJournalInfo->hardestMoment}}"/></td>
                     </tr>
                     <tr>
                            <td>Время сна</td>
                            <td><input type="text" name="sleepDuration" value="{{$nutritionJournalInfo->sleepDuration}}"/></td>
                            <td>Время отхода ко сну</td>
                            <td><input type="text" name="bedtime" value="{{$nutritionJournalInfo->bedtime}}"/></td>
                            <td>Объём воды</td>
                            <td><input type="text" name="waterVolume" value="{{$nutritionJournalInfo->waterVolume}}"/></td>
                            <td>Ваши победы сегодня</td>
                            <td><input type="text" name="dailyPersonalVictories" value="{{$nutritionJournalInfo->dailyPersonalVictories}}"/></td>
                     </tr>
                     <tr>
                            <th></th>
                            <th>Блюда/продукты</th>
                            <th>Время приема пищи</th>
                            <th>Шкала голода</th>
                            <th>Я ем потому что (голод, скучно, режим, за компанию, нужно)</th>
                            <th>Чувство сразу после еды (вздутие, тяжесть, боль, газы, сила, фокус, энергия)</th>
                            <th>Чувство через 2-3 часа после еды (вздутие, тяжесть, боль, газы, сила, фокус, энергия)</th>
                            <th>Другие примечания</th>
                     </tr>
                     <tr>
                            <th>Завтрак</th>
                            <td><input type="text" name="b_dish" value="{{$nutritionJournalInfo->Breakfast->b_dish}}"/></td>
                            <td><input type="text" name="b_mealtime" value="{{$nutritionJournalInfo->Breakfast->b_mealtime}}"/></td>
                            <td><input type="text" name="b_hungerScale" value="{{$nutritionJournalInfo->Breakfast->b_hungerScale}}"/></td>
                            <td><input type="text" name="b_iEatBecause" value="{{$nutritionJournalInfo->Breakfast->b_iEatBecause}}"/></td>
                            <td><input type="text" name="b_afterEatingFeeling" value="{{$nutritionJournalInfo->Breakfast->b_afterEatingFeeling}}"/></td>
                            <td><input type="text" name="b_someHoursAfterEatingFeeling" value="{{$nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling}}"/></td>
                            <td><input type="text" name="b_anotherNote" value="{{$nutritionJournalInfo->Breakfast->b_anotherNote}}"/></td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><input type="text" name="fl_dish" value="{{$nutritionJournalInfo->FirstLunch->fl_dish}}"/></td>
                            <td><input type="text" name="fl_mealtime" value="{{$nutritionJournalInfo->FirstLunch->fl_mealtime}}"/></td>
                            <td><input type="text" name="fl_hungerScale" value="{{$nutritionJournalInfo->FirstLunch->fl_hungerScale}}"/></td>
                            <td><input type="text" name="fl_iEatBecause" value="{{$nutritionJournalInfo->FirstLunch->fl_iEatBecause}}"/></td>
                            <td><input type="text" name="fl_afterEatingFeeling" value="{{$nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling}}"/></td>
                            <td><input type="text" name="fl_someHoursAfterEatingFeeling" value="{{$nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling}}"/></td>
                            <td><input type="text" name="fl_anotherNote" value="{{$nutritionJournalInfo->FirstLunch->fl_anotherNote}}"/></td>
                     </tr>
                     <tr>
                            <th>Обед</th>
                            <td><input type="text" name="d_dish" value="{{$nutritionJournalInfo->Dinner->d_dish}}"/></td>
                            <td><input type="text" name="d_mealtime" value="{{$nutritionJournalInfo->Dinner->d_mealtime}}"/></td>
                            <td><input type="text" name="d_hungerScale" value="{{$nutritionJournalInfo->Dinner->d_hungerScale}}"/></td>
                            <td><input type="text" name="d_iEatBecause" value="{{$nutritionJournalInfo->Dinner->d_iEatBecause}}"/></td>
                            <td><input type="text" name="d_afterEatingFeeling" value="{{$nutritionJournalInfo->Dinner->d_afterEatingFeeling}}"/></td>
                            <td><input type="text" name="d_someHoursAfterEatingFeeling" value="{{$nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling}}"/></td>
                            <td><input type="text" name="d_anotherNote" value="{{$nutritionJournalInfo->Dinner->d_anotherNote}}"/></td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><input type="text" name="sl_dish" value="{{$nutritionJournalInfo->SecondLunch->sl_dish}}"/></td>
                            <td><input type="text" name="sl_mealtime" value="{{$nutritionJournalInfo->SecondLunch->sl_mealtime}}"/></td>
                            <td><input type="text" name="sl_hungerScale" value="{{$nutritionJournalInfo->SecondLunch->sl_hungerScale}}"/></td>
                            <td><input type="text" name="sl_iEatBecause" value="{{$nutritionJournalInfo->SecondLunch->sl_iEatBecause}}"/></td>
                            <td><input type="text" name="sl_afterEatingFeeling" value="{{$nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling}}"/></td>
                            <td><input type="text" name="sl_someHoursAfterEatingFeeling" value="{{$nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling}}"/></td>
                            <td><input type="text" name="sl_anotherNote" value="{{$nutritionJournalInfo->SecondLunch->sl_anotherNote}}"/></td>
                     </tr>
                     <tr>
                            <th>Ужин</th>
                            <td><input type="text" name="s_dish" value="{{$nutritionJournalInfo->Supper->s_dish}}"/></td>
                            <td><input type="text" name="s_mealtime" value="{{$nutritionJournalInfo->Supper->s_mealtime}}"/></td>
                            <td><input type="text" name="s_hungerScale" value="{{$nutritionJournalInfo->Supper->s_hungerScale}}"/></td>
                            <td><input type="text" name="s_iEatBecause" value="{{$nutritionJournalInfo->Supper->s_iEatBecause}}"/></td>
                            <td><input type="text" name="s_afterEatingFeeling" value="{{$nutritionJournalInfo->Supper->s_afterEatingFeeling}}"/></td>
                            <td><input type="text" name="s_someHoursAfterEatingFeeling" value="{{$nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling}}"/></td>
                            <td><input type="text" name="s_anotherNote" value="{{$nutritionJournalInfo->Supper->s_anotherNote}}"/></td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><input type="text" name="tl_dish" value="{{$nutritionJournalInfo->ThirdLunch->tl_dish}}"/></td>
                            <td><input type="text" name="tl_mealtime" value="{{$nutritionJournalInfo->ThirdLunch->tl_mealtime}}"/></td>
                            <td><input type="text" name="tl_hungerScale" value="{{$nutritionJournalInfo->ThirdLunch->tl_hungerScale}}"/></td>
                            <td><input type="text" name="tl_iEatBecause" value="{{$nutritionJournalInfo->ThirdLunch->tl_iEatBecause}}"/></td>
                            <td><input type="text" name="tl_afterEatingFeeling" value="{{$nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling}}"/></td>
                            <td><input type="text" name="tl_someHoursAfterEatingFeeling" value="{{$nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling}}"/></td>
                            <td><input type="text" name="tl_anotherNote" value="{{$nutritionJournalInfo->ThirdLunch->tl_anotherNote}}"/></td>
                     </tr>
              </table>
              <input type="submit" value="отправить"/>
       </form>
@endforeach
</div>
@endsection
