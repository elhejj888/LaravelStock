<?php

namespace App\Observers;

use App\Models\material;
use App\Models\Historisation;
use Illuminate\Foundation\Auth\User;

class MaterialObserver
{
    /**
     * Handle the Material "created" event.
     */
    public function created(material $material): void
    {
        $user2 = auth()->user();

    // Specify the attributes you want to track for the created material
    $trackedAttributes = [
        'TypeProduit',
        'choix',
        'Marque',
        'Tag',
        'AdresseMac',
        'N_Facture',
        'DateAchat',
        'Fournisseur',
        'Emplacement',
        'etat',
        'Emplacement',
        'Site',
        // Add more attributes here as needed
    ];

    // Create an array containing only the tracked attributes
    $changes = [];
    foreach ($trackedAttributes as $attribute) {
        $changes[$attribute] = $material->{$attribute};
    }

    $historisation = new Historisation([
        'user_id' => auth()->id(),
        'FullName' => $user2->Nom . " " . $user2->Prenom,
        'edited_id' => $material->id,
        'operation' => 'created',
        'type' => 'materiel',
        'changes' => json_encode($changes), // Convertir en JSON pour stockage
    ]);

    $historisation->save();
    }

    /**
     * Handle the Material "updated" event.
     */
    public function updated(material $material): void
{
    $changes = [];
    $allowedAttributes = ['etat', 'Emplacement', 'Site' , 'userId']; // List of attributes you want to track changes for
    $user2 ="";
    foreach ($allowedAttributes as $attribute) {
        if ($material->isDirty($attribute)) {
            if($attribute == 'userId')
            {
                $user = User::find($material->userId);
                $changes['userId'] = $user->Nom ." ".$user->Prenom;
            }
            else
            $changes[$attribute] = $material->getOriginal($attribute);
        }
    }

    if (auth()->check()) {
        $user2 = auth()->user();
        $historisation = new Historisation([
            'user_id' => auth()->id(),
            'FullName' => $user2->Nom . " " . $user2->Prenom,
            'edited_id' => $material->id,
            'operation' => 'updated',
            'type' => 'materiel',
            'changes' => json_encode($changes), // Convertir en JSON pour stockage
        ]);
    } else {
        $historisation = new Historisation([
            'user_id' => auth()->id(),
            'edited_id' => $material->id,
            'operation' => 'updated',
            'type' => 'materiel',
            'changes' => json_encode($changes), // Convertir en JSON pour stockage
        ]);
    }

    $historisation->save();
}


    /**
     * Handle the Material "deleted" event.
     */
    public function deleted(material $material): void
    {
        $historisation = new Historisation([
            'user_id' => auth()->id(),
            'edited_id' => $material->id,
            'operation' => 'deleted',
            'type' => 'materiel',
            'changes' => json_encode($material->toArray()), // Enregistre toutes les valeurs du matériel supprimé
        ]);
    
        $historisation->save();
    }

    /**
     * Handle the Material "restored" event.
     */
    public function restored(Material $material): void
    {
        //
    }

    /**
     * Handle the Material "force deleted" event.
     */
    public function forceDeleted(Material $material): void
    {
        //
    }
}
