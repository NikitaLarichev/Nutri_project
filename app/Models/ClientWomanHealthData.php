<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientWomanHealthData extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'woman_question_1', 
        'woman_question_2', 
        'woman_question_3', 
        'woman_question_4', 
        'woman_question_5',
        'woman_question_6', 
        'woman_question_7', 
        'woman_question_8',
        'woman_question_9',
        'woman_question_10',
        'woman_question_11', 
        'woman_question_12', 
    ];
    public $timestamps = false;
}
