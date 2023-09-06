<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use App\Models\Historisation;
use App\Models\User;
use Illuminate\Support\Carbon;

class UserObserver
{
    public function created(User $user): void
    {
        $trackedAttributes = [
            'Nom',
            'Prenom',
            'Service',
            'Site',
            // Add more attributes here as needed
        ];
            // Create an array containing only the tracked attributes
        $changes = [];
        foreach ($trackedAttributes as $attribute) {
            $changes[$attribute] = $user->{$attribute};
        }
        if (auth()->check()) {
        $historisation = new Historisation([
            $user2 = auth()->user(),
            'user_id' => auth()->id(),
            'edited_id' => $user->id,
            'FullName' =>$user2->Nom." ".$user2->prenom,
            'operation' => 'created',
            'type' => 'user',
            'changes' => json_encode($changes), // Enregistre toutes xles valeurs du nouveau matériel
        ]);
        }
        else{
            $historisation = new Historisation([
                'user_id'=>0,
                'edited_id' => $user->id,
                'FullName' =>"Systeme",
                'operation' => 'created',
                'type' => 'user',
                'changes' => json_encode($user->toArray()), // Enregistre toutes xles valeurs du nouveau matériel
            ]);
        }
        $historisation->save();
    }

        public function updated(User $user): void
        {
            $changes = [];
            $allowedAttributes = ['Nom', 'Prenom', 'Role', 'Service', 'Site', 'email','password'];
            $user2 = auth()->user();
        
            foreach ($allowedAttributes as $attribute) {
                if($attribute == 'password')
                    $changes['Connexion'] = "Tentative de Connexion";
                else if ($user->isDirty($attribute)) {
                    $changes[$attribute] = $user->getOriginal($attribute);
                    
                }
                
            }
            if (!auth()->check()) {
                $historisation = new Historisation([
                    'user_id'=> 0,
                    'edited_id' => $user->id,
                    'FullName' => "Systeme de Connexion",
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
        $user2 = auth()->user();
        $historisation = new Historisation([
            'user_id' => auth()->id(),
            'FullName' =>$user2->Nom." ".$user2->Prenom,
            'edited_id' => $user->id,
            'operation' => 'deleted',
            'type' => 'user',
            'changes' => json_encode($user->toArray()), // Enregistre toutes les valeurs du matériel supprimé
        ]);
    
        $historisation->save();
    }

    // ... Rest of the methods
}
