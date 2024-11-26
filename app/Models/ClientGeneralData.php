<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGeneralData extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'date_of_completion',
        'fio',
        'birthday',
        'phone',
        'email',
        'reasons_for_consultation',
        'desired_results',
        'height',
        'weight',
        'weight_fluctuations',
        'waist_circumference',
        'gain_weight',
        'lose_weight',
        'save_weight',
        'desire_weight',
        'analysis_results',
        'extra_info',
    ];
    protected $attributes = [
        'gain_weight' => '0',
        'lose_weight' => '0',
        'save_weight' => '0',
    ];
    public $timestamps = false;
    
}
