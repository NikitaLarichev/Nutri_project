<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Livewire\Chat;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'date',
        'content',
        'isRead',
    ];

    protected static function booted(): void
    {
        static::created(function (Message $message) {
            //dd('eee');
            //Chat::refreshComponent();
        });
    }
}
