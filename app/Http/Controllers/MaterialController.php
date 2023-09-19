<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Historisation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Observers\MaterialObserver;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{

    /**
     * Récupère les valeurs nécessaires pour le formulaire d'ajout de matériel.
     *
     * Cette fonction récupère les types de produits, les sites disponibles et d'autres valeurs spécifiques
     * depuis la base de données pour les utiliser dans le formulaire d'ajout de matériel.
     *
     * @return \Illuminate\View\View La vue du formulaire d'ajout de matériel avec les données nécessaires.
     */

    public function fetchMaterialFormValues()
    {
        if (auth()->check()) {
        // Récupérer les types de produits disponibles depuis la table 'admins'.
        $TypeProduit = DB::table('admins')
            ->select('TypeProduit') // Spécifiez la colonne dont vous voulez des valeurs distinctes
            ->whereNotNull('TypeProduit')
            ->distinct()
            ->get();

    // Récupérer les sites disponibles pour les utilisateurs depuis la table 'admins'.
        $sites = DB::table('admins')
            ->select('Site') // Spécifiez la colonne dont vous voulez des valeurs distinctes
            ->whereNotNull('Site')
            ->distinct()
            ->get();

    // Récupérer d'autres valeurs nécessaires depuis la table 'admins' (par exemple, pour les matériels).
            $values = Admin::where('Qui', 'materiel')->get();

    // Retourner la vue du formulaire d'ajout de matériel avec les données récupérées.
        return view('Material/addMaterial', ['TypeProduits' => $TypeProduit, 'sites' => $sites, 'values' => $values]);
    }else {
        return redirect('login')->with('error', 'Authentication failed.');
    }
    }


    function RetrieveMaterials()
    {
        if (auth()->check()) {
            $materials = material::all();
            $sites= DB::table('admins')
                ->select('Site') // Specify the column you want distinct values from
                ->whereNotNull('Site')
                ->where('Qui','materiel')
                ->distinct()
                ->get();
            // $distinctValues will contain an array of distinct values from the specified column        
            return view('Material/materials', ['materials' => $materials, 'message' => '' , 'sites'=>$sites]);
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }


    public function showMaterial($id)
    {
        if (auth()->check()) {

            $historiques = Historisation::where('edited_id', $id)->where('type', 'materiel')->get();
            $material = material::findOrFail($id);
            $user = "";
            if ($material->etat == "Assigne")
            $user = User::where('id', $material->userId)->first();
            $currentDateTime = Carbon::now();
            $buyingTime = Carbon::parse($material->DateAchat);
            $garantie = $currentDateTime->diff($buyingTime);
            $garantie = $garantie->format('%y Années, %m Mois, et %d Jours');
            $garantieYears = explode(' ', $garantie)[0];
            return view('Material/details', ['material' => $material, 'garantie' => $garantie, 'expired' => $garantieYears, 'historiques' => $historiques, 'user' => $user]);
        } else
            return redirect('login')->with('error', 'Authentication failed.');
    }

    public function addMaterial(Request $request)
    {

        if (auth()->check()) {
            if ($request->input('choix'))
                $choix = $request->input('choix');
            else $choix = "";
            $material = material::create([
                'Site' => $request->input('site'),
                'choix' => $choix,
                'Emplacement' => $request->input('emplacement'),
                'DateAchat' => date('Y-m-d', strtotime($request->input('achat'))),
                'N_Facture' => $request->input('facture'),
                'Fournisseur' => $request->input('fournisseur'),
                'AdresseMac' => $request->input('mac'),
                'Tag' => $request->input('tag'),
                'Marque' => $request->input('marque'),
                'etat' => "Disponible",
                'TypeProduit' => $request->input('type')
            ]);

            return redirect('/materials')->with('message', 'Materiel Ajouté avec succes !!');
        } else
            return redirect('login')->with('error', 'Authentication failed.');
    }

    public function updateMaterial($id)
    {
        if (auth()->check()) {
            $material = material::findOrFail($id);
            $types= DB::table('admins')
                ->select('TypeProduit') // Specify the column you want distinct values from
                ->whereNotNull('TypeProduit')
                ->where('Qui','materiel')
                ->distinct()
                ->get();
            $choix= DB::table('admins')
                ->select('Choix') // Specify the column you want distinct values from
                ->whereNotNull('Choix')
                ->where('TypeProduit','=',$material->TypeProduit)
                ->distinct()
                ->get();
            $marques= DB::table('admins')
                ->select('Marque') // Specify the column you want distinct values from
                ->whereNotNull('Marque')
                ->where('TypeProduit','=',$material->TypeProduit)
                ->distinct()
                ->get();
            $sites= DB::table('admins')
                ->select('Site') // Specify the column you want distinct values from
                ->whereNotNull('Site')
                ->where('Qui','materiel')
                ->distinct()
                ->get();
                $fournisseur = DB::table('admins')
                ->select('Foutnisseur') // Specify the column you want distinct values from
                ->whereNotNull('Foutnisseur')
                ->distinct()
                ->get();
                $emplacement=DB::table('admins')
                ->select('Emplacement') // Specify the column you want distinct values from
                ->whereNotNull('Emplacement')
                ->distinct()
                ->get();
            return view('Material/editMaterial', ['material' => $material , 'types'=>$types , 'sites'=>$sites ,
             'fournisseurs' =>$fournisseur , 'choix'=>$choix , 'marques'=>$marques,'Emplacement'=>$emplacement]);
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }
    public function updateValues(Request $request)
    {
        if (auth()->check()) {
            $id = $request->input('id');
            $material = material::findOrFail($id);

            $material->TypeProduit = $request->input('type');
            $material->Marque = $request->input('marque');
            $material->Tag = $request->input('tag');
            $material->AdresseMac = $request->input('mac');
            $material->etat = $request->input('etat');
            $material->N_Facture = $request->input('facture');
            $material->DateAchat = date('Y-m-d', strtotime($request->input('achat')));
            $material->fournisseur = $request->input('fournisseur');
            $material->Emplacement = $request->input('emplacement');
            $material->Site = $request->input('site');

            $material->save();

            return redirect('/materials')->with('success', 'Material updated successfully');
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }


    public function updateValues2(Request $request)
    {
        if (auth()->check()) {
            $id = $request->input('id');
            $material = material::findOrFail($id);

            $material->etat = $request->input('etat');
            if ($request->input('userId') == -1)
                $material->userId = null;
            $material->description = $request->input('description');
            $material->Emplacement = $request->input('emplacement');
            $material->Site = $request->input('site');

            $material->save();

            return redirect('/materials')->with('message', 'Material updated successfully');
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }

    public function checkDuplicate(Request $request)
    {
        if($request->initialMacValue || $request->initialTagValue){
        $initialMacValue = $request->initialMacValue;
        $initialTagValue = $request->initialTagValue;
        $tagExists = Material::where('Tag', $request->tag)
            ->where('Tag', '!=', $initialTagValue)
            ->exists();

        $macExists = Material::where('AdresseMac', '!=', $initialMacValue)
        ->where('AdresseMac', $request->mac)
        ->exists();
        }
        else{
        $tagExists = Material::where('Tag', $request->tag)
        ->exists();
        $macExists = material::where('AdresseMac', $request->mac)
        ->exists();
        }
        

        return response()->json([
            'macExists' => $macExists,
            'tagExists' => $tagExists,
        ]);
    }


    public function addDesc(Request $request)
    {
        if (auth()->check()) {
            $id = $request->input('id');
            $material = material::findOrFail($id);

            $material->etat = $request->input('etat');
            if ($request->input('userId') == -1)
                $material->userId = null;
            $material->description = $request->input('description');

            $material->save();

            return redirect('/materials')->with('message', 'Material updated successfully');
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }


    public function deletedvalues()
    {
        if (auth()->check()) {
            $materials = material::where('etat', 'rupture');
            return view('Material/deleted', ['materials' => $materials]);
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }


    public function maintainvalues()
    {
        if (auth()->check()) {
            $materials = material::where('etat', 'maintenance')->simplePaginate(20);
            $sites= DB::table('admins')
                ->select('Site') // Specify the column you want distinct values from
                ->whereNotNull('Site')
                ->where('Qui','materiel')
                ->distinct()
                ->get();

            return view('Material/maintain', ['materials' => $materials , 'sites'=>$sites , 'message'=>'']);
        } else {
            return redirect('login')->with('message', 'Authentication failed.');
        }
    }


    public function deleteMaterial($id)
    {
        if (auth()->check()) {

            $material = material::findOrFail($id);
            if ($material->userId == null && $material->etat != "Assigne") {
                $material->etat = "rupture";
                $material->save();
                return redirect('/materials')->with('message', 'Materiel Mit en rebus avec succes !!');
            } 
            if ($material->etat == "Disponible") {
                $material->etat = "rupture";
                $material->save();
                return redirect('/materials')->with('message', 'Materiel Mit en rebus avec succes !!');
            } 
            else{
                return redirect('/materials')->with('message', 'Materiel Deja affecté !!');
            }
            //rupture
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }


    public function DeleteMaterial2($id)
    {
        if (auth()->check()) {

            $material = material::findOrFail($id);
            $material->delete();
            return redirect('/deletedmaterials')->with('message', 'Supprimé avec Succes..!');
        } else {
            return redirect('login')->with('message', 'Veuillez vous Connecter...');
        }
    }
    public function repareMaterial(Request $request)
    {
        if (auth()->check()) {

            $material = material::findOrFail($request->input('id'));
            $material->etat = "Disponible";
            $material->emplacement = $request->input('emplacement');
            $material->Site = $request->input('site');
            $material->description = "";
            $material->save();
            return redirect('/maintainMaterials')->with('message', 'Materiel mit en stock avec succes');
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }

    public function MiseEnSortie(Request $request)
    {
        if (auth()->check()) {
            $material = material::findOrFail($request->input('id'));
            $material->DateSortie = $request->input('Sortie');
            $material->etat = "Sortie";
            $material->save();
            return redirect('/deletedmaterials')->with('message', 'Mit en Sortie avec Succes..!');
        } else {
            return redirect('login')->with('message', 'Veuillez vous Connecter...');
        }
    }
/*
// Count users by role
$rolesToSearch = ['Autorisé', 'Restreint', 'Départ'];
$userCounts = User::whereIn('Role', $rolesToSearch)
    ->where(function ($query) use ($rolesToSearch) {
        foreach ($rolesToSearch as $role) {
            $query->orWhere('Role', 'LIKE', '%' . $role . '%');
        }
    })
    ->groupBy('Role')
    ->selectRaw('count(*) as count, Role')
    ->pluck('count', 'Role');

// Remplacez les valeurs NULL par 0 pour chaque rôle
foreach ($rolesToSearch as $role) {
    $userCounts[$role] = $userCounts[$role] ?? 0;
}

return view('home', [
    'types' => $types,
    'materialCounts' => $materialCounts,
    'userCounts' => $userCounts,
    'maintenanceCount' => $ruptureCount,
    'ruptureCount' => $ruptureCount,
]);

*/


public function home(Request $request)
{
    if (auth()->check()) {
        // Get distinct types from the database in a single query
        $types = DB::table('admins')
            ->select('TypeProduit')
            ->whereNotNull('TypeProduit')
            ->where('Qui', 'materiel')
            ->distinct()
            ->pluck('TypeProduit');

        // Count materials for each type and status using a single query
        $materialCounts = material::whereIn('TypeProduit', $types)
            ->whereIn('etat', ['Disponible', 'Assigne', 'maintenance', 'rupture'])
            ->selectRaw('TypeProduit, etat, count(*) as count')
            ->groupBy('TypeProduit', 'etat')
            ->get()
            ->groupBy('TypeProduit')
            ->map(function ($group) {
                return $group->pluck('count', 'etat');
            });

        // Count materials in rupture and maintenance using a single query
        $ruptureCount = material::whereIn('etat', ['rupture', 'maintenance'])->count();

        // Count users by role using a single query
        $rolesToSearch = ['Autorisé', 'Restreint', 'Départ'];
        $userCounts = User::whereIn('Role', $rolesToSearch)
            ->selectRaw('count(*) as count, Role')
            ->groupBy('Role')
            ->get()
            ->pluck('count', 'Role');

        // Replace null values with 0 for each role
        foreach ($rolesToSearch as $role) {
            $userCounts[$role] = $userCounts[$role] ?? 0;
        }

        return view('home', [
            'types' => $types,
            'materialCounts' => $materialCounts,
            'userCounts' => $userCounts,
            'maintenanceCount' => $ruptureCount,
            'ruptureCount' => $ruptureCount,
        ]);
    } else {
        return redirect('login')->with('message', 'Authentication failed.');
    }
}

    /**
     * Affecte un matériel à un utilisateur spécifique.
     *
     * Cette fonction permet d'associer un matériel à un utilisateur en mettant à jour
     * son identifiant d'utilisateur et en changeant son état à "Assigné".
     *
     * @param int $materialId L'identifiant du matériel à affecter.
     * @param int $userId L'identifiant de l'utilisateur auquel le matériel est assigné.
     * @return \Illuminate\Http\RedirectResponse Redirige vers la liste des matériaux avec un message de succès.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException Si le matériel n'est pas trouvé.
     */

    public function assignerMaterielToUser($materialId, $userId)
    {
        if (auth()->check()) {
            $material = material::findOrFail($materialId);
            $material->userId = $userId;
            $material->etat = "Assigne";
            $material->save();
            return redirect('/materials')->with('message', 'Materiel assigné avec succes');
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }
    // Function to search for materials
    

    public function index()
    {
        if (auth()->check()) {
    $materials = material::all();

    return view('Material.dataTable', ['materials'=>$materials , 'message' => '']);
    
    }else {
        return redirect('login')->with('error', 'Authentication failed.');
    }    
}


    public function MeterielsEnRebut(){

        if (auth()->check()) {
        $materials = material::where('etat', 'rupture')
        ->orWhere('etat', 'Sortie')->get();

    return view('Material.Corbeille', ['materials'=>$materials , 'message' => '']);
    
    }else {
        return redirect('login')->with('error', 'Authentication failed.');
    }

    }

    public function RetrieveUsers($id){
        if (auth()->check()) {
            $material = material::findOrFail($id);
            $users = User::all();
            return view('Material.affecting', ['users'=>$users , 'material'=>$material , 'message' => '']);
        } else {
            return redirect('login')->with('error', 'Authentication failed.');
        }    

    }
}
