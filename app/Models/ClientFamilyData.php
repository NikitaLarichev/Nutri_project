<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFamilyData extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'marital_status',
        'children',
        'children_age',
    ];
    public $timestamps = false;
}
