<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFoodHabitsData extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'main_meals_amount',
        'meals_amount',
        'food_limit', 
        'food_intolerance', 
        'food_allergy', 
        'what_drink',
        'cups_of_tea_coffee',
        'cooking_oil',
        'sugar_source', 
        'favorite_food', 
        'food_cravings', 
        'food_avoid', 
        'diet', 
    ];
    public $timestamps = false;
}
