<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakfast extends Model
{
    use HasFactory;

    protected $table = 'breakfasts';

    protected $fillable = [
        'b_dish',
        'b_mealtime',
        'b_hungerScale',
        'b_iEatBecause',
        'b_afterEatingFeeling',
        'b_someHoursAfterEatingFeeling',
        'b_anotherNote',
    ];
    
    public $timestamps = false;

    public function dailyGeneral()
    {
        return $this->belongsTo(DailyGeneral::class);
    }
}
