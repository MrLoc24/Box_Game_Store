<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'CardID',
        'userID',
        'card_number',
        'cvv',
        'payment_date',
        'card_name',
        'image',
    ];
}
