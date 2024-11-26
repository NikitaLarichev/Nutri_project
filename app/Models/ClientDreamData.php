<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDreamData extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'bedtime',
        'rising_time',
        'do_you_feel_rest',
        'asleep_time',
        'doy_you_fall_asleep_easly',
        'nightly_awakening',
        'snores',
        'daily_routine',
    ];
    public $timestamps = false;
}
