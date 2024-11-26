<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBadHabitsData extends Model
{
    use HasFactory;
         /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'smoking',
        'cigarets_per_day',
        'do_you_want_quit_smoking',
        'alcohol',
        'alcohol_how_often',
        'what_alcohol',
        'another_dependencies',
    ];
    public $timestamps = false;
}
