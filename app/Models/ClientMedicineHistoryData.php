<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMedicineHistoryData extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'massage',
        'osteopath',
        'nutrition',
        'supplements',
        'sport',
        'herb',
        'drugs',
        'another',

        'med_question_1',
        'med_question_2',
        'med_question_4',
        'med_question_5',
        'med_question_6',
        'med_question_7',
        'med_question_8', 

        'med_question_9', 
        'med_question_10', 
        'med_question_11', 
        'med_question_12', 

        'med_question_13',
        'med_question_14',
        'med_question_15',
        'med_question_16',
        'med_question_17',
        'med_question_18',
        'med_question_19',

        'med_question_20', 
        'med_question_21', 
        'med_question_22', 

        'med_question_23',
        'med_question_24',
        'med_question_25',
        'med_question_26',
        'med_question_27',
        'med_question_28',
        'med_question_29',
        'med_question_30',
        'med_question_31', 
        'med_question_32',
        'med_question_33',
        'med_question_34',

        'med_question_35',

        'med_question_36',
        'med_question_37',
        'med_question_38',
        'med_question_39',
        'med_question_40',

        'med_question_41',
        'med_question_42',

        'med_question_43', 
        'med_question_44', 
        'med_question_45', 
        'med_question_46', 
        'med_question_47', 
    ];
    public $timestamps = false;
}
