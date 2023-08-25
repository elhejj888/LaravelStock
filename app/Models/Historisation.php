<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'edited_id',
        'type',
        'operation',
        'changes',
        'FullName',       
    ];
}
