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
            return view('Material/editMaterial', ['material' => $material , 'types'=>$types , 'sites'=>$sites , 'fournisseurs' =>$fournisseur]);
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
        $tagExists = material::where('Tag', $request->tag)->exists();
        $macExists = material::where('AdresseMac', $request->mac)->exists();
        $invoiceExists = material::where('N_Facture', $request->facture)->exists();


        return response()->json([
            'macExists' => $macExists,
            'tagExists' => $tagExists,
            'invoiceExists' => $invoiceExists,
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
            $materials = material::where('etat', 'rupture')->simplePaginate(20);
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
            return redirect('login')->with('error', 'Authentication failed.');
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

    public function home(Request $request)
{
    if (auth()->check()) {
        $materialCounts = [];
        $statuses = ['Disponible', 'Assigne', 'maintenance', 'rupture'];

        // Get distinct types from the database
        $types = DB::table('admins')
            ->select('TypeProduit')
            ->whereNotNull('TypeProduit')
            ->where('Qui', 'materiel')
            ->distinct()
            ->pluck('TypeProduit');

        foreach ($types as $type) {
            $typeCounts = [];

            foreach ($statuses as $status) {
                // Count materials for each type and status
                $count = material::where('TypeProduit', $type)
                    ->where('etat', $status)
                    ->count();

                $typeCounts[$status] = $count;
            }

            $materialCounts[$type] = $typeCounts;
        }

        // Count materials in rupture and maintenance
        $ruptureCount = material::whereIn('etat', ['rupture', 'maintenance'])->count();
        
        // Count users by role
        $userCounts = User::whereIn('Role', ['Autorisé', 'Restreint', 'Départ'])
            ->groupBy('Role')
            ->selectRaw('count(*) as count, Role')
            ->pluck('count', 'Role');
        
        return view('home', [
            'types'=>$types,
            'materialCounts' => $materialCounts,
            'userCounts' => $userCounts,
            'maintenanceCount' => $ruptureCount,
            'ruptureCount' => $ruptureCount,
        ]);
    } else {
        return redirect('login')->with('error', 'Authentication failed.');
    }
}


   /* public function rechercherMaterial(Request $request)
    {
        $materials = material::where('Marque', 'Like', '%' . $request->search . '%')
        ->orWhere('TypeProduit', 'Like', '%' . $request->search . '%')
        ->orWhere('N_Facture', 'Like', '%' . $request->search . '%')
        ->orWhere('DateAchat', 'Like', '%' . $request->search . '%')
        ->orWhere('Fournisseur', 'Like', '%' . $request->search . '%')
        ->orWhere('Tag', 'Like', '%' . $request->search . '%')
        ->orWhere('Site', 'Like', '%' . $request->search . '%')
        ->orWhere('Emplacement', 'Like', '%' . $request->search . '%')->get();
        $output = "";
        foreach ($materials as $material) {
            if ($material->etat != 'rupture') {
                $output .= '<tr>
                    <td>' . $material->TypeProduit . '</td>
                    <td>' . $material->Marque . '</td>
                    <td>' . $material->Tag . '</td>
                    <td>' . $material->etat . '</td>
                    <td>' . $material->DateAchat . '</td>
                    <td>' . $material->Emplacement . '</td>
                    <td>' . $material->Site . '</td>
                    <td class="op">
                        <button class="operation"  onclick="window.location.href = \'' . route('showMaterial', ['id' => $material->id]) . '\';">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        Détails
                        </button>
                    </td>
                    <td class="op">
                        <button class="operation" ' . ($material->etat === 'Disponible' ? 'onclick="window.location.href = \'' . route('affectMaterial', ['id' => $material->id]) . '\';"' : 'disabled style="background-color: grey; color: white;"') . '>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#101357" class="bi bi-send-plus" viewBox="0 0 16 16">
                                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z" />
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        Affecter
                        </button>
                        <dialog class="modal" id="modal-' . $material->id . '">
                    <h1>Etat de Stock </h1>
                    <table>
                        <td>
                            <label for="etat">Etat : </label>
                        </td>
                        <td>
                            <select class="etat-select" data-material-id="' . $material->id . '"
                                name="etat2" id="">
                                <option value="' . $material->etat . '" style="display: none;">
                                    ' . $material->etat . '</option>';
                                if ($material->etat == 'Assigne'){
                                    $output.= '<option value="Disponible">Disponible</option>
                                        <option value="maintenance">Maintenance</option>';
                                    }
                                elseif ($material->etat == 'maintenance'){
                                    $output.= '<option value="Disponible">Disponible</option>
                                        <option value="Assigne">Assigne</option>';
                                    }
                                else{
                                    $output.= '<option value="Disponible">Disponible</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="Assigne">Assigne</option>';
                                    }
                            $output .= '</select>
                        </td>
                    </table>
                    <div>
                        <div class="additional-content" data-material-id="' . $material->id . '">
                        </div>
                        <button class="button close-button" id="Operation">
                            Close
                        </button>
                    </div>
                </dialog>
                        </td>
                        <td class="op">
                <button id="open-button" class="operation" data-modal="modal-'. $material->id .'">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto"
                                            fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                            <path
                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                        </svg>

                    Gerer
                </button>
            </td>';
                if (Auth::user()->Role === 'Admin') {
                    $output .= '<td class="op">
                    <button class="operation"
                        onclick="window.location.href = \'' . route('updateMaterial', ['id' => $material->id]) .';"
                        style="text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto"
                            fill="#101357" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                        Modifier
                    </button>
                </td>
                <td class="op">
                    <button class="operation"
                        onclick="if (confirm(\'Êtes-vous sûr de supprimer ..?\')) window.location.href = this.getAttribute(\'data-href\');"
                        data-href="'. route('deleteMaterial', ['id' => $material->id]) .'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto"
                            fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        Mise en rebut
                        </button>
                        </td>';
                }
            $output .= '</tr>';
            }
        }

        return response($output);
    }*/

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
    public function searchMaterialToAssign(Request $request)
    {
        $material = material::findOrFail($request->id);
        $users = User::where('Nom', 'Like', '%' . $request->search . '%')
            ->orWhere('Prenom', 'Like', '%' . $request->search . '%')
            ->orWhere('email', 'Like', '%' . $request->search . '%')->get();
        $output = "";
        foreach ($users as $user) {
            if ($user->Role != "Départ") {
                $output .= '<tr>
                        <td>' . $user->Nom . '</td>
                        <td>' . $user->Prenom . '</td>
                        <td>' . $user->email . '</td>
                        <td>' . $user->Service . '</td>
                        <td>' . $user->Site . '</td>
                        <td class="op">
                        <button class="operation" onclick="window.location.href = \'' . route('assignMaterial', ['materialId' => $material->id, 'userId' => $user->id]) . '\';">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#101357" class="bi bi-send-plus" viewBox="0 0 16 16" style="text-decoration: none;">
                                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                            Affecter
                        </button>
                        </td>
                        </tr>';
            }
            return response($output);
        }
    }
    public function searchDeletedMaterial(Request $request)
    {
        $materials = material::where('Marque', 'Like', '%' . $request->search . '%')->orWhere('TypeProduit', 'Like', '%' . $request->search . '%')->orWhere('N_Facture', 'Like', '%' . $request->search . '%')->orWhere('DateAchat', 'Like', '%' . $request->search . '%')->orWhere('Fournisseur', 'Like', '%' . $request->search . '%')->orWhere('Tag', 'Like', '%' . $request->search . '%')->orWhere('Site', 'Like', '%' . $request->search . '%')->orWhere('Emplacement', 'Like', '%' . $request->search . '%')->get();
        $output = "";
        foreach ($materials as $material) {
            if ($material->etat == 'rupture') {
                $output .= '<tr>
                <td>' . $material->TypeProduit . '</td>
                <td>' . $material->Marque . '</td>
                <td>' . $material->Tag . '</td>
                <td>' . $material->etat . '</td>
                <td>' . $material->N_Facture . '</td>
                <td>' . $material->DateAchat . '</td>
                <td>' . $material->Emplacement . '</td>
                <td>' . $material->Site . '</td>
                <td class="op">
                            <button class="operation"  onclick="window.location.href = \'' . route('showMaterial', ['id' => $material->id]) . '\';">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Détails
                            </button>
                </td>';
                $output .= '</tr>';
            }
        }

        return response($output);
    }

    public function index()
    {
    $materials = material::all();
    return view('Material.dataTable', ['materials'=>$materials , 'message' => '']);
    }
    public function MeterielsEnRebut(){
        $materials = material::where('etat', 'rupture')
        ->orWhere('etat', 'Sortie')->get();
    return view('Material.Corbeille', ['materials'=>$materials , 'message' => '']);
    
    }
}
