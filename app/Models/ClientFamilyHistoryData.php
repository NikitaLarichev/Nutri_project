<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFamilyHistoryData extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'mother',
        'father',
        'grandma',
        'grandpa',
        'brothers',
        'sisters',
    ];
    public $timestamps = false;
}
