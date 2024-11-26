<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondLunch extends Model
{
    use HasFactory;

    protected $table = 'second_lunches';

    protected $fillable = [
        'sl_dish',
        'sl_mealtime',
        'sl_hungerScale',
        'sl_iEatBecause',
        'sl_afterEatingFeeling',
        'sl_someHoursAfterEatingFeeling',
        'sl_anotherNote',
    ];
    
    public $timestamps = false;

    public function dailyGeneral()
    {
        return $this->belongsTo(DailyGeneral::class);
    }
}
