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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->where('historisations.type', 'user'); // Assuming 'type' column in historisations indicates user or material
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'edited_id')->where('historisations.type', 'material');// Assuming 'type' column in historisations indicates user or material
    }
}
