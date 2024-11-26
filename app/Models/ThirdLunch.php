<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdLunch extends Model
{
    use HasFactory;

    protected $table = 'third_lunches';

    protected $fillable = [
        'tl_dish',
        'tl_mealtime',
        'tl_hungerScale',
        'tl_iEatBecause',
        'tl_afterEatingFeeling',
        'tl_someHoursAfterEatingFeeling',
        'tl_anotherNote',
    ];
    
    public $timestamps = false;

    public function dailyGeneral()
    {
        return $this->belongsTo(DailyGeneral::class);
    }
}
