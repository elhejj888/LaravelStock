<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    protected $fillable = [
        'TypeProduit',
        'Marque',
        'Tag',
        'AdresseMac',
        'N_Facture',
        'DateAchat',
        'Fournisseur',
        'Emplacement',
        'Site',
        'etat',
        'userId',
        'description',
        'choix',
    ];
}
