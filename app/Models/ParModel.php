<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParModel extends Model
{
    use HasFactory;
    protected $table = 'partable';

    protected $fillable = [
        'partners',
        'subject',
        'date',
        'status',
        'amount',
        'extension'
    ];
}
