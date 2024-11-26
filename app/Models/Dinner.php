<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinner extends Model
{
    use HasFactory;

    protected $table = 'dinners';

    protected $fillable = [
        'd_dish',
        'd_mealtime',
        'd_hungerScale',
        'd_iEatBecause',
        'd_afterEatingFeeling',
        'd_someHoursAfterEatingFeeling',
        'd_anotherNote',
    ];
    
    public $timestamps = false;

    public function dailyGeneral()
    {
        return $this->belongsTo(DailyGeneral::class);
    }
}
