<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use App\Models\Historisation;
use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        $historisation = new Historisation([
            $user2 = auth()->user(),
            'user_id' => auth()->id(),
            'edited_id' => $user->id,
            'FullName' =>$user2->Nom." ".$user2->prenom,
            'operation' => 'created',
            'type' => 'user',
            'changes' => json_encode($user->toArray()), // Enregistre toutes xles valeurs du nouveau matériel
        ]);
    
        $historisation->save();
    }

    public function updated(User $user): void
    {
        $changes = $user->getDirty();

        if (!auth()->check()) {
            $historisation = new Historisation([
                'user_id'=> 0,
                'edited_id' => $user->id,
                'FullName' => "Inconnu",
                'operation' => 'updated',
                'type' => 'user',
                'changes' => json_encode($changes),]);
                $historisation->save();
        
        $historisation->save();
    }
    else {
        $user2 = auth()->user();
        $historisation = new Historisation([
            'user_id' => auth()->id(),
            'FullName' =>$user2->Nom." ".$user2->Prenom,
            'edited_id' => $user->id,
            'operation' => 'updated',
            'type' => 'user',
            'changes' => json_encode($changes),
        ]);
        $historisation->save();

    }


    }

    public function deleted(User $user): void
    {
        $historisation = new Historisation([
            'user_id' => auth()->id(),
            'edited_id' => $user->id,
            'operation' => 'deleted',
            'type' => 'user',
            'changes' => json_encode($user->toArray()), // Enregistre toutes les valeurs du matériel supprimé
        ]);
    
        $historisation->save();
    }

    // ... Rest of the methods
}
