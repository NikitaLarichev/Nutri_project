<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function breakfast(): HasOne
    {
        return $this->hasOne(Breakfast::class);
    }

    public function firstLunch(): HasOne
    {
        return $this->hasOne(FirstLunch::class);
    }

    public function dinner(): HasOne
    {
        return $this->hasOne(Dinner::class);
    }

    public function secondLunch(): HasOne
    {
        return $this->hasOne(SecondLunch::class);
    }

    public function supper(): HasOne
    {
        return $this->hasOne(Supper::class);
    }

    public function thirdLunch(): HasOne
    {
        return $this->hasOne(ThirdLunch::class);
    }
}
