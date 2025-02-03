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
       <h4><span>{{date('d-m-Y', strtotime($nutritionJournalInfo->date))}}</span><span class="ms-4">{{$week[date('w', strtotime($nutritionJournalInfo->date))]}}</span></h4>
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
                            <td><input class="input-nj" type="time" name="risingTime" value='{{$nutritionJournalInfo->risingTime}}'/>
                     @error('risingTime')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>Качество сна</td>
                            <td><textarea rows='4' type="text" name="sleepQuality">{{$nutritionJournalInfo->sleepQuality}}</textarea>
                     @error('sleepQuality')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>Легко ли было вставать утром</td>
                            <td><textarea rows='4' type="text" name="wasRisingEasy">{{$nutritionJournalInfo->wasRisingEasy}}</textarea>
                     @error('wasRisingEasy')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>Время сна</td>
                            <td><input class="input-nj" type="time" name="sleepDuration" value='{{$nutritionJournalInfo->sleepDuration}}'/>
                     @error('sleepDuration')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     </tr>
                     <tr>
                     <td>Уровень энергии в течение дня</td>
                            <td><textarea rows='4' type="text" name="dailyEnergyLevel">{{$nutritionJournalInfo->dailyEnergyLevel}}</textarea>
                     @error('dailyEnergyLevel')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>Физическая активность за день (зал, тренировки или количество шагов)</td>
                            <td><textarea rows='4' type="text" name="dailyPhysicActivity">{{$nutritionJournalInfo->dailyPhysicActivity}}</textarea>
                     @error('dailyPhysicActivity')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     <td>Какие измененения вы замечали в вашем настроении или физическом состоянии?</td>
                            <td colspan='3'><textarea rows='4' type="text" name="conditionChanges">{{$nutritionJournalInfo->conditionChanges}}</textarea>
                     @error('conditionChanges')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            
                     </tr>
                     <tr>
                     <td>Самые трудные моменты сегодня</td>
                            <td><textarea rows='4' type="text" name="hardestMoment">{{$nutritionJournalInfo->hardestMoment}}</textarea>
                     @error('hardestMoment')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     <td>Ваши победы сегодня</td>
                            <td><textarea rows='4' type="text" name="dailyPersonalVictories">{{$nutritionJournalInfo->dailyPersonalVictories}}</textarea>
                     @error('dailyPersonalVictories')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     <td>Объём воды</td>
                            <td><textarea rows='4' type="text" name="waterVolume">{{$nutritionJournalInfo->waterVolume}}</textarea>
                     @error('waterVolume')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     <td>Время отхода ко сну</td>
                            <td><input class="input-nj" type="time" name="bedtime" value='{{$nutritionJournalInfo->bedtime}}'/>
                     @error('bedtime')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            
                     </tr>
                     <tr>
                            <th></th>
                            <th>Блюда/продукты</th>
                            <th>Время приема пищи</th>
                            <th><div>Шкала голода</div><div>(1 - 10)</div></th>
                            <th>Я ем потому что</th>
                            <th>Чувство сразу после еды</th>
                            <th>Чувство через 2-3 часа после еды</th>
                            <th>Другие примечания</th>
                     </tr>
                     <tr>
                            <th>Завтрак</th>
                            <td><textarea rows='4' type="text" name="b_dish">
                                   @if(@isset($nutritionJournalInfo->Breakfast->b_dish)){{$nutritionJournalInfo->Breakfast->b_dish}}@endif

                            </textarea></td>
                            <td><input class="input-nj" type="time" name="b_mealtime" value='@if(@isset($nutritionJournalInfo->Breakfast->b_mealtime)){{$nutritionJournalInfo->Breakfast->b_mealtime}}@endif'/>
                      @error('b_mealtime')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="number" min='1' max='10' name="b_hungerScale" value='@if(@isset($nutritionJournalInfo->Breakfast->b_hungerScale)){{$nutritionJournalInfo->Breakfast->b_hungerScale}}@endif'/>
                      @error('b_hungerScale')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                                   <select class="input-nj" name="b_iEatBecause">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Breakfast->b_iEatBecause))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_iEatBecause))
                                                        @if($nutritionJournalInfo->Breakfast->b_iEatBecause == "голод")
                                                               selected
                                                        @endif
                                                 @endif>голод
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_iEatBecause))
                                                        @if($nutritionJournalInfo->Breakfast->b_iEatBecause == "скучно")
                                                               selected
                                                        @endif
                                                 @endif>скучно
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_iEatBecause))
                                                        @if($nutritionJournalInfo->Breakfast->b_iEatBecause == "режим")
                                                               selected
                                                        @endif
                                                 @endif>режим
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_iEatBecause))
                                                        @if($nutritionJournalInfo->Breakfast->b_iEatBecause == "за компанию")
                                                               selected
                                                        @endif
                                                 @endif>за компанию
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_iEatBecause))
                                                        @if($nutritionJournalInfo->Breakfast->b_iEatBecause == "нужно")
                                                               selected
                                                        @endif
                                                 @endif>нужно
                                          </option>
                                   </select>
                                   @error('b_iEatBecause')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </td>
                            <td>
                            <select  class="input-nj" name="b_afterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Breakfast->b_afterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_afterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_afterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_afterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_afterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_afterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_afterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                      @error('b_afterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="b_someHoursAfterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Breakfast->b_someHoursAfterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                      @error('b_someHoursAfterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><textarea rows='4' type="text" name="b_anotherNote">@if(@isset($nutritionJournalInfo->Breakfast->b_anotherNote)){{$nutritionJournalInfo->Breakfast->b_anotherNote}}@endif</textarea>
                      @error('b_anotherNote')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><textarea rows='4' type="text" name="fl_dish">@if(@isset($nutritionJournalInfo->FirstLunch->fl_dish)){{$nutritionJournalInfo->FirstLunch->fl_dish}}@endif</textarea>
                      @error('fl_dish')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="time" name="fl_mealtime" value='@if(@isset($nutritionJournalInfo->FirstLunch->fl_mealtime)){{$nutritionJournalInfo->FirstLunch->fl_mealtime}}@endif'/>
                      @error('fl_mealtime')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="number" min='1' max='10' name="fl_hungerScale" value='@if(@isset($nutritionJournalInfo->FirstLunch->fl_hungerScale)){{$nutritionJournalInfo->FirstLunch->fl_hungerScale}}@endif'/>
                      @error('fl_hungerScale')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="fl_iEatBecause">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->FirstLunch->fl_iEatBecause))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_iEatBecause))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_iEatBecause == "голод")
                                                               selected
                                                        @endif
                                                 @endif>голод
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_iEatBecause))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_iEatBecause == "скучно")
                                                               selected
                                                        @endif
                                                 @endif>скучно
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_iEatBecause))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_iEatBecause == "режим")
                                                               selected
                                                        @endif
                                                 @endif>режим
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_iEatBecause))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_iEatBecause == "за компанию")
                                                               selected
                                                        @endif
                                                 @endif>за компанию
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_iEatBecause))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_iEatBecause == "нужно")
                                                               selected
                                                        @endif
                                                 @endif>нужно
                                          </option>
                                   </select>
                      @error('fl_iEatBecause')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="fl_afterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_afterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                      @error('fl_afterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="fl_someHoursAfterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->FirstLunch->fl_someHoursAfterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                      @error('fl_someHoursAfterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><textarea rows='4' type="text" name="fl_anotherNote">@if(@isset($nutritionJournalInfo->FirstLunch->fl_anotherNote)){{$nutritionJournalInfo->FirstLunch->fl_anotherNote}}@endif</textarea>
                      @error('fl_anotherNote')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     </tr>
                     <tr>
                            <th>Обед</th>
                            <td><textarea rows='4' type="text" name="d_dish">@if(@isset($nutritionJournalInfo->Dinner->d_dish)){{$nutritionJournalInfo->Dinner->d_dish}}@endif</textarea>
                     @error('d_dish')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="time" name="d_mealtime" value='@if(@isset($nutritionJournalInfo->Dinner->d_mealtime)){{$nutritionJournalInfo->Dinner->d_mealtime}}@endif'/>
                     @error('d_mealtime')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="number" min='1' max='10' name="d_hungerScale" value='@if(@isset($nutritionJournalInfo->Dinner->d_hungerScale)){{$nutritionJournalInfo->Dinner->d_hungerScale}}@endif'/>
                     @error('d_hungerScale')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="d_iEatBecause">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Dinner->d_iEatBecause))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_iEatBecause))
                                                        @if($nutritionJournalInfo->Dinner->d_iEatBecause == "голод")
                                                               selected
                                                        @endif
                                                 @endif>голод
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_iEatBecause))
                                                        @if($nutritionJournalInfo->Dinner->d_iEatBecause == "скучно")
                                                               selected
                                                        @endif
                                                 @endif>скучно
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_iEatBecause))
                                                        @if($nutritionJournalInfo->Dinner->d_iEatBecause == "режим")
                                                               selected
                                                        @endif
                                                 @endif>режим
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_iEatBecause))
                                                        @if($nutritionJournalInfo->Dinner->d_iEatBecause == "за компанию")
                                                               selected
                                                        @endif
                                                 @endif>за компанию
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_iEatBecause))
                                                        @if($nutritionJournalInfo->Dinner->d_iEatBecause == "нужно")
                                                               selected
                                                        @endif
                                                 @endif>нужно
                                          </option>
                                   </select>
                     @error('d_iEatBecause')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="d_afterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Dinner->d_afterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_afterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_afterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_afterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_afterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_afterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_afterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                     @error('d_afterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="d_someHoursAfterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Dinner->d_someHoursAfterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                     @error('d_someHoursAfterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><textarea rows='4' type="text" name="d_anotherNote">@if(@isset($nutritionJournalInfo->Dinner->d_anotherNote)){{$nutritionJournalInfo->Dinner->d_anotherNote}}@endif</textarea>
                     @error('d_anotherNote')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><textarea rows='4' type="text" name="sl_dish">@if(@isset($nutritionJournalInfo->SecondLunch->sl_dish)){{$nutritionJournalInfo->SecondLunch->sl_dish}}@endif</textarea>
                     @error('sl_dish')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="time" name="sl_mealtime" value='@if(@isset($nutritionJournalInfo->SecondLunch->sl_mealtime)){{$nutritionJournalInfo->SecondLunch->sl_mealtime}}@endif'/>
                     @error('sl_mealtime')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="number" min='1' max='10' name="sl_hungerScale" value='@if(@isset($nutritionJournalInfo->SecondLunch->sl_hungerScale)){{$nutritionJournalInfo->SecondLunch->sl_hungerScale}}@endif'/>
                     @error('sl_hungerScale')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="sl_iEatBecause">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->SecondLunch->sl_iEatBecause))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_iEatBecause))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_iEatBecause == "голод")
                                                               selected
                                                        @endif
                                                 @endif>голод
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_iEatBecause))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_iEatBecause == "скучно")
                                                               selected
                                                        @endif
                                                 @endif>скучно
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_iEatBecause))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_iEatBecause == "режим")
                                                               selected
                                                        @endif
                                                 @endif>режим
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_iEatBecause))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_iEatBecause == "за компанию")
                                                               selected
                                                        @endif
                                                 @endif>за компанию
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_iEatBecause))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_iEatBecause == "нужно")
                                                               selected
                                                        @endif
                                                 @endif>нужно
                                          </option>
                                   </select>
                     @error('sl_iEatBecause')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="sl_afterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_afterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                     @error('sl_afterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="sl_someHoursAfterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->SecondLunch->sl_someHoursAfterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                     @error('sl_someHoursAfterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><textarea rows='4' type="text" name="sl_anotherNote">@if(@isset($nutritionJournalInfo->SecondLunch->sl_anotherNote)){{$nutritionJournalInfo->SecondLunch->sl_anotherNote}}@endif</textarea> 
                     @error('sl_anotherNote')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     </tr>
                     <tr>
                            <th>Ужин</th>
                            <td><textarea rows='4' type="text" name="s_dish" >@if(@isset($nutritionJournalInfo->Supper->s_dish)){{$nutritionJournalInfo->Supper->s_dish}}@endif</textarea>
                      @error('s_dish')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="time" name="s_mealtime" value='@if(@isset($nutritionJournalInfo->Supper->s_mealtime)){{$nutritionJournalInfo->Supper->s_mealtime}}@endif'/>
                      @error('s_mealtime')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="number" min='1' max='10' name="s_hungerScale" value='@if(@isset($nutritionJournalInfo->Supper->s_hungerScale)){{$nutritionJournalInfo->Supper->s_hungerScale}}@endif'/>
                      @error('s_hungerScal')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="s_iEatBecause">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Supper->s_iEatBecause))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Supper->s_iEatBecause))
                                                        @if($nutritionJournalInfo->Supper->s_iEatBecause == "голод")
                                                               selected
                                                        @endif
                                                 @endif>голод
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_iEatBecause))
                                                        @if($nutritionJournalInfo->Supper->s_iEatBecause == "скучно")
                                                               selected
                                                        @endif
                                                 @endif>скучно
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_iEatBecause))
                                                        @if($nutritionJournalInfo->Supper->s_iEatBecause == "режим")
                                                               selected
                                                        @endif
                                                 @endif>режим
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_iEatBecause))
                                                        @if($nutritionJournalInfo->Supper->s_iEatBecause == "за компанию")
                                                               selected
                                                        @endif
                                                 @endif>за компанию
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_iEatBecause))
                                                        @if($nutritionJournalInfo->Supper->s_iEatBecause == "нужно")
                                                               selected
                                                        @endif
                                                 @endif>нужно
                                          </option>
                                   </select>
                      @error('s_iEatBecause')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="s_afterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Supper->s_afterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Supper->s_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_afterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_afterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_afterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_afterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_afterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_afterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                      @error('s_afterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="s_someHoursAfterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->Supper->s_someHoursAfterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                      @error('s_someHoursAfterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><textarea rows='4' type="text" name="s_anotherNote" >@if(@isset($nutritionJournalInfo->Supper->s_anotherNote)){{$nutritionJournalInfo->Supper->s_anotherNote}}@endif</textarea>
                      @error('s_anotherNote')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     </tr>
                     <tr>
                            <th>Перекус</th>
                            <td><textarea rows='4' type="text" name="tl_dish" >@if(@isset($nutritionJournalInfo->ThirdLunch->tl_dish)){{$nutritionJournalInfo->ThirdLunch->tl_dish}}@endif</textarea>
                      @error('tl_dish')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="time" name="tl_mealtime" value='@if(@isset($nutritionJournalInfo->ThirdLunch->tl_mealtime)){{$nutritionJournalInfo->ThirdLunch->tl_mealtime}}@endif'/>
                      @error('tl_mealtime')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><input class="input-nj" type="number" min='1' max='10' name="tl_hungerScale" value='@if(@isset($nutritionJournalInfo->ThirdLunch->tl_hungerScale)){{$nutritionJournalInfo->ThirdLunch->tl_hungerScale}}@endif'/>
                      @error('tl_hungerScale')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="tl_iEatBecause">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->ThirdLunch->tl_iEatBecause))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_iEatBecause))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_iEatBecause == "голод")
                                                               selected
                                                        @endif
                                                 @endif>голод
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_iEatBecause))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_iEatBecause == "скучно")
                                                               selected
                                                        @endif
                                                 @endif>скучно
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_iEatBecause))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_iEatBecause == "режим")
                                                               selected
                                                        @endif
                                                 @endif>режим
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_iEatBecause))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_iEatBecause == "за компанию")
                                                               selected
                                                        @endif
                                                 @endif>за компанию
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_iEatBecause))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_iEatBecause == "нужно")
                                                               selected
                                                        @endif
                                                 @endif>нужно
                                          </option>
                                   </select>
                      @error('tl_iEatBecause')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                                   <select  class="input-nj" name="tl_afterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_afterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                     @error('tl_afterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td>
                            <select  class="input-nj" name="tl_someHoursAfterEatingFeeling">
                                          <option 
                                                 @if(!@isset($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling))
                                                               selected
                                                 @endif>------
                                          </option>
                                          <option 
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling == "вздутие")
                                                               selected
                                                        @endif
                                                 @endif>вздутие
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling == "тяжесть")
                                                               selected
                                                        @endif
                                                 @endif>тяжесть
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling == "боль")
                                                               selected
                                                        @endif
                                                 @endif>боль
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling == "газы")
                                                               selected
                                                        @endif
                                                 @endif>газы
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling == "сила")
                                                               selected
                                                        @endif
                                                 @endif>сила
                                          </option>
                                          <option
                                                 @if(@isset($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling))
                                                        @if($nutritionJournalInfo->ThirdLunch->tl_someHoursAfterEatingFeeling == "энергия")
                                                               selected
                                                        @endif
                                                 @endif>энергия
                                          </option>
                                   </select>
                      @error('tl_someHoursAfterEatingFeeling')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                            <td><textarea rows='4' type="text" name="tl_anotherNote">@if(@isset($nutritionJournalInfo->ThirdLunch->tl_anotherNote)){{$nutritionJournalInfo->ThirdLunch->tl_anotherNote}}@endif</textarea>
                      @error('tl_anotherNote')<div class="alert alert-danger">{{ $message }}</div>@enderror</td>
                     </tr>
              </table>
              <input class="button-outline c3 my-4 px-3 py-2" type="submit" value="отправить"/>
       </form>
@endforeach
</div>
@endsection
