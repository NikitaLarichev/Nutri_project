<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supper extends Model
{
    use HasFactory;

    protected $table = 'suppers';

    protected $fillable = [
        's_dish',
        's_mealtime',
        's_hungerScale',
        's_iEatBecause',
        's_afterEatingFeeling',
        's_someHoursAfterEatingFeeling',
        's_anotherNote',
    ];
    
    public $timestamps = false;

    public function dailyGeneral()
    {
        return $this->belongsTo(DailyGeneral::class);
    }
}
