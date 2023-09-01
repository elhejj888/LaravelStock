<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'Qui',
        'TypeProduit',
        'Marque',
        'Choix',
        'Foutnisseur',
        'emplacement',       
        'Stock',
        'Service',
        'Site', 
    ];
}
