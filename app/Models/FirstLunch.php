<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstLunch extends Model
{
    use HasFactory;

    protected $table = 'first_lunches';

    protected $fillable = [
        'fl_dish',
        'fl_mealtime',
        'fl_hungerScale',
        'fl_iEatBecause',
        'fl_afterEatingFeeling',
        'fl_someHoursAfterEatingFeeling',
        'fl_anotherNote',
    ];
    
    public $timestamps = false;

    public function dailyGeneral()
    {
        return $this->belongsTo(DailyGeneral::class);
    }
}
