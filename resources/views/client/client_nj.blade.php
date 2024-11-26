@extends('layouts.client_menu', ['client'=>$client])
@section('menu')
@parent
@endsection
@section('client_content')

<div class="container ms-m15">
    @foreach($nutritionJournalInfoArr as $nutritionJournalInfo)
            <table class="table table-bordered ms-font-medium small">
                    <tr>
                        <th colspan="8"><div>{{$nutritionJournalInfo->date}}</div></th>
                    </tr>
                    <tr>
                        <td>Время пробуждения</td>
                        <td><div>{{$nutritionJournalInfo->risingTime}}</div></td>
                        <td>Качество сна</td>
                        <td><div>{{$nutritionJournalInfo->sleepQuality}}</div></td>
                        <td>Физическая активность за день (зал, тренировки или количество шагов)</td>
                        <td><div>{{$nutritionJournalInfo->dailyPhysicActivity}}</div></td>
                        <td>Какие измненения вы замечали в вашем настроении или физическом состоянии?</td>
                        <td><div>{{$nutritionJournalInfo->conditionChanges}}</div></td>
                    </tr>
                    <tr>
                        <td>День недели</td>
                        <td><div></div</td>
                        <td>Легко ли было вставать утром</td>
                        <td><div>{{$nutritionJournalInfo->wasRisingEasy}}</div></td>
                        <td>Уровень энергии в течение дня</td>
                        <td><div>{{$nutritionJournalInfo->dailyEnergyLevel}}</div></td>
                        <td>Самые трудные моменты сегодня</td>
                        <td><div>{{$nutritionJournalInfo->hardestMoment}}</div></td>
                    </tr>
                    <tr>
                        <td>Время сна</td>
                        <td><div>{{$nutritionJournalInfo->sleepDuration}}</div></td>
                        <td>Время отхода ко сну</td>
                        <td><div>{{$nutritionJournalInfo->bedtime}}</div></td>
                        <td>Объём воды</td>
                        <td><div>{{$nutritionJournalInfo->waterVolume}}</div></td>
                        <td>Ваши победы сегодня</td>
                        <td><div>{{$nutritionJournalInfo->dailyPersonalVictories}}</div></td>
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
                        <td><div>{{$nutritionJournalInfo->Breakfast->b_dish}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Breakfast->b_mealtime}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Breakfast->b_hungerScale}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Breakfast->b_iEatBecause}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Breakfast->b_afterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Breakfast->b_anotherNote}}</div></td>
                    </tr>
                    <tr>
                        <th>Перекус</th>
                        <td><div>{{$nutritionJournalInfo->FirstLunch->fl_dish}}</div></td>
                        <td><div>{{$nutritionJournalInfo->FirstLunch->fl_mealtime}}</div></td>
                        <td><div>{{$nutritionJournalInfo->FirstLunch->fl_hungerScale}}</div></td>
                        <td><div>{{$nutritionJournalInfo->FirstLunch->fl_iEatBecause}}</div></td>
                        <td><div>{{$nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->FirstLunch->fl_anotherNote}}</div></td>
                    </tr>
                    <tr>
                        <th>Обед</th>
                        <td><div>{{$nutritionJournalInfo->Dinner->d_dish}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Dinner->d_mealtime}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Dinner->d_hungerScale}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Dinner->d_iEatBecause}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Dinner->d_afterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Dinner->d_anotherNote}}</div></td>
                    </tr>
                    <tr>
                        <th>Перекус</th>
                        <td><div>{{$nutritionJournalInfo->SecondLunch->sl_dish}}</div></td>
                        <td><div>{{$nutritionJournalInfo->SecondLunch->sl_mealtime}}</div></td>
                        <td><div>{{$nutritionJournalInfo->SecondLunch->sl_hungerScale}}</div></td>
                        <td><div>{{$nutritionJournalInfo->SecondLunch->sl_iEatBecause}}</div></td>
                        <td><div>{{$nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->SecondLunch->sl_anotherNote}}</div></td>
                    </tr>
                    <tr>
                        <th>Ужин</th>
                        <td><div>{{$nutritionJournalInfo->Supper->s_dish}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Supper->s_mealtime}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Supper->s_hungerScale}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Supper->s_iEatBecause}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Supper->s_afterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->Supper->s_anotherNote}}</div></td>
                    </tr>
                    <tr>
                        <th>Перекус</th>
                        <td><div>{{$nutritionJournalInfo->ThirdLunch->tl_dish}}</div></td>
                        <td><div>{{$nutritionJournalInfo->ThirdLunch->tl_mealtime}}</div></td>
                        <td><div>{{$nutritionJournalInfo->ThirdLunch->tl_hungerScale}}</div></td>
                        <td><div>{{$nutritionJournalInfo->ThirdLunch->tl_iEatBecause}}</div></td>
                        <td><div>{{$nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling}}</div></td>
                        <td><div>{{$nutritionJournalInfo->ThirdLunch->tl_anotherNote}}</div></td>
                    </tr>
            </table>
    @endforeach
</div>

@endsection