<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyGeneral extends Model
{
    use HasFactory;

    protected $table = 'daily_general';

    protected $fillable = [
        'date',
        'sleepDuration',
        'risingTime', 
        'sleepQuality',
        'WasRisingEasy',
        'bedtime',
        'dailyPhysicActivity', 
        'dailyEnergyLevel',
        'waterVolume', 
        'conditionChanges',
        'hardestMoment',
        'dailyPersonalVictories',
    ];
    
    public $timestamps = false;

    public function breakfast()
    {
        return $this->hasOne(Breakfast::class);
    }

    public function firstLunch()
    {
        return $this->hasOne(FirstLunch::class);
    }

    public function dinner()
    {
        return $this->hasOne(Dinner::class);
    }

    public function secondLunch()
    {
        return $this->hasOne(SecondLunch::class);
    }

    public function supper()
    {
        return $this->hasOne(Supper::class);
    }

    public function thirdLunch()
    {
        return $this->hasOne(ThirdLunch::class);
    }
}
