<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientWorkData extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'profession',
        'do_like_your_working',
        'work_character',
        'working_history',
        'hobby',
        'rest',
        'sport',
        'driving_time',
        'transport_time',
        'pc_time',
        'working_time',
        'walking_time',
    ];
    public $timestamps = false;
}
