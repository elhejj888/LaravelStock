<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\User;
use App\Models\Admin;
use App\Models\material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Historisation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Récupère la liste des utilisateurs pour affichage.
     *
     * Cette fonction permet de récupérer la liste des utilisateurs, de les trier par site et service,
     * puis de les paginer pour l'affichage.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     * 
     * - Si l'utilisateur est authentifié, il obtient la liste paginée des utilisateurs.
     * - Si l'utilisateur n'est pas authentifié, il est redirigé vers la page de connexion avec un message d'erreur.
     */

    function retrieveAndPaginateUsers(){
        if (auth()->check()) {

        $users = User::orderBy('Site')->orderBy('Service')->simplePaginate(20);
        return view('User/users',['users'=>$users , 'message'=>""]);
    }
    else
        return redirect('login')->with('error', 'Authentication failed.');

    }

    /**
     * Affiche les détails d'un utilisateur et son historique.
     *
     * Cette fonction permet d'afficher les détails d'un utilisateur spécifique, y compris
     * les matériaux associés et l'historique des actions de l'utilisateur.
     *
     * @param int $id L'identifiant de l'utilisateur à afficher. Utilisez 0 pour afficher les détails du système.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     * 
     * - Si l'utilisateur est authentifié, il obtient les détails de l'utilisateur et son historique.
     * - Si l'utilisateur n'est pas authentifié, il est redirigé vers la page de connexion avec un message d'erreur.
     */

    public function showUserDetails($id)
    {
        if (auth()->check()) {
            if($id == 0){
                $historiques = Historisation::where('FullName', 'Systeme')->where('type','user')->get();
                $user = array(
                    "Details" => "Ceci est le système responsable de la gestion des connexions. Vous pouvez vérifier toutes les connexions passées par les utilisateurs ici."
                );                
            }
            else{
            $materials = material::where('userId',$id)->get();
            $historiques = Historisation::where('edited_id', $id)->where('type','user')->get();
            $user = User::findOrFail($id);
            }
            return view('User/showUser', ['user' => $user , 'historiques' => $historiques , 'materials'=>$materials]);
        }
        else{
            return redirect('login')->with('message', 'Veuillez vous connecter..!');
        }
    }

    /**
     * Ajoute un nouvel utilisateur.
     *
     * Cette fonction permet d'ajouter un nouvel utilisateur à la base de données en utilisant les informations
     * fournies dans la requête HTTP.
     *
     * @param \Illuminate\Http\Request $request Les données de la requête HTTP.
     * @return \Illuminate\Http\RedirectResponse
     * 
     * - Si l'utilisateur est authentifié, un nouvel utilisateur est créé avec les informations fournies.
     * - Si l'utilisateur n'est pas authentifié, il est redirigé vers la page de connexion avec un message d'erreur.
     */

    public function saveUser(Request $request){
        if (auth()->check()) {

        // Créer un nouvel utilisateur en utilisant les données de la requête.
        $user = User::create(['Nom' => $request->input('Nom'),
        'Prenom'=>$request->input('Prenom'),
        'email' => Str::lower($request->input('Email')),
        'extension'=>$request->input('Extension'),
        'Role'=>$request->input('Role'),
        'Service'=>$request->input('Service'),
        'Site'=>$request->input('Site'),
        'password'=>"test",
        'Site'=>$request->input('Site'),
        'Date_Embauche'=>$request->input('DateEmbauche')
        ]);

        // Rediriger vers la liste des utilisateurs avec un message de succès.
        return redirect('/usersDataTable')->with('message', "L'utilisateur a bien etait ajouté");
    }
    else{
        // Rediriger l'utilisateur vers la page de connexion avec un message d'erreur.
        return redirect('login')->with('message', 'Veuillez vous connecter..!');
    }

    }

    /**
     * Vérifie la duplication d'une adresse e-mail ou d'une extension d'utilisateur.
     *
     * Cette fonction prend en compte les données de la requête et vérifie si une adresse e-mail ou une extension
     * d'utilisateur existe déjà dans la base de données.
     *
     * @param \Illuminate\Http\Request $request Les données de la requête HTTP contenant l'e-mail et l'extension à vérifier.
     * @return \Illuminate\Http\JsonResponse Une réponse JSON indiquant si l'e-mail et/ou l'extension existent déjà.
     */

    public function checkDuplicate(Request $request)
    {
    // Vérifier si l'adresse e-mail existe déjà dans la base de données.
    $emailExists = User::where('email', $request->email)->exists();

    // Vérifier si l'extension de l'utilisateur existe déjà dans la base de données.
    $extensionExists = User::where('extension', $request->extension)->exists();

    // Retourner une réponse JSON indiquant si l'e-mail et/ou l'extension existent déjà.
    return response()->json([
        'emailExists' => $emailExists,
        'extensionExists' => $extensionExists,
    ]);
    }

    /**
     * Affiche le formulaire de mise à jour d'un utilisateur.
     *
     * Cette fonction permet d'afficher un formulaire de mise à jour pour un utilisateur spécifique.
     * Elle récupère également une liste distincte de sites à partir de la table 'admins' pour une utilisation potentielle dans le formulaire.
     *
     * @param int $id L'ID de l'utilisateur que vous souhaitez mettre à jour.
     * @return \Illuminate\View\View Une vue contenant le formulaire de mise à jour et les données de l'utilisateur.
     */
    public function updatedUserInfo($id){
        if (auth()->check()) {
            
        // Récupérer l'utilisateur spécifique en fonction de son ID.
        $user = User::findOrFail($id);

        // Récupérer une liste distincte de sites à partir de la table 'admins'.
            $sites= DB::table('admins')
                ->select('Site') // Spécifiez la colonne dont vous voulez des valeurs distinctes.
                ->whereNotNull('Site')
                ->where('Qui','user')
                ->distinct()
                ->get();

        // Afficher la vue du formulaire de mise à jour avec les données de l'utilisateur et la liste des sites.
        return view('User/editUser', ['user' => $user , 'sites'=>$sites] );
    }
        else{
            // Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié.
            return redirect('login')->with('message', 'Veuillez vous connecter..!');
        }
        }

        /**
         * Met à jour les valeurs d'un utilisateur dans la base de données.
         *
         * Cette fonction permet de mettre à jour les valeurs d'un utilisateur dans la base de données en fonction des données fournies dans la requête HTTP.
         *
         * @param \Illuminate\Http\Request $request Les données de la requête HTTP contenant les nouvelles valeurs de l'utilisateur.
         * @return \Illuminate\Http\RedirectResponse Redirige vers la liste des utilisateurs avec un message de confirmation.
         */

    public function setUpdatedUserValues(Request $request ){
        if (auth()->check()) {
        // Récupérer l'ID de l'utilisateur à partir de la requête.
        $id = $request->input('id');

        // Récupérer l'utilisateur correspondant à cet ID.
        $user = User::findOrFail($id);

        // Mettre à jour les propriétés de l'utilisateur avec les nouvelles valeurs de la requête.
        $user->email = $request->input('email');
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->extension = $request->input('Extension');
        $user->Service = $request->input('Service');
        $user->Site = $request->input('Site');
        $user->Date_Embauche = $request->input('DateEmbauche');
        $user->Role = $request->input('Role');

        // Enregistrer les modifications dans la base de données.
        $user->save();

        // Rediriger vers la liste des utilisateurs avec un message de confirmation.
        return redirect('/usersDataTable')->with('message', "Utilisateur Modifié avec succes");
        }
        else{
            return redirect('login')->with('message', 'Veuillez vous connecter..!');
        }
        }

        /**
         * Marque un utilisateur comme ayant quitté l'entreprise.
         *
         * Cette fonction permet de marquer un utilisateur comme ayant quitté l'entreprise en modifiant son rôle dans la base de données. Si l'utilisateur a encore du matériel associé, le départ ne sera pas autorisé.
         *
         * @param int $id L'ID de l'utilisateur à marquer comme ayant quitté l'entreprise.
         * @return \Illuminate\Http\RedirectResponse Redirige vers la liste des utilisateurs avec un message de confirmation.
         */        

        public function markUserAsDeparted($id){
            if (auth()->check()) {

        // Récupérer l'utilisateur correspondant à l'ID donné.
            $user = User::findOrFail($id);

        // Vérifier si l'utilisateur a encore du matériel associé.
            $user2 = material::where('userId',$id)->exists();

            if($user2)
        // Si l'utilisateur a encore du matériel, renvoyer un message d'erreur.
                return redirect('/users')->with('message','Départ impossible , utilisateur a encore un materiel..!');

            else {
        // Mettre à jour le rôle de l'utilisateur pour indiquer son départ.
                $user->Role = "Départ";
                $user->save();
        // Rediriger vers la liste des utilisateurs avec un message de confirmation.
                return redirect('/usersDataTable')->with('message','Succes , Departure bien executée');
            }
            }
            else{
        // Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié.
                return redirect('login')->with('message', 'Authentication failed.');
            }
        }


        /**
         * Supprime un utilisateur de façon permanente.
         *
         * Cette fonction permet de supprimer de façon permanente un utilisateur de la base de données. Elle vérifie d'abord si l'utilisateur actuellement connecté ne tente pas de se supprimer lui-même, puis elle supprime l'utilisateur ciblé s'il ne s'agit pas de l'utilisateur actuel.
         *
         * @param int $id L'ID de l'utilisateur à supprimer.
         * @return \Illuminate\Http\RedirectResponse Redirige vers la liste des utilisateurs supprimés avec un message de confirmation.
         */
        public function permanentlyDeleteUser($id)
        {
            if (auth()->check()) {
                // Vérifier que l'utilisateur ne tente pas de se supprimer lui-même.
                if (auth()->user()->id != $id) {
                    // Récupérer l'utilisateur ciblé à supprimer.
                    $user = User::findOrFail($id);

                    // Supprimer l'utilisateur de façon permanente.
                    $user->delete();

                    // Rediriger vers la liste des utilisateurs supprimés avec un message de confirmation.
                    return redirect('/deletedusers')->with('message', 'L\'utilisateur a été supprimé avec succès.');
                
                } else {
                    // Rediriger avec un message d'erreur si l'utilisateur tente de se supprimer lui-même.
                    return redirect('/deletedusers')->with('message', 'Vous ne pouvez pas vous supprimer vous-mêmes !');
                }
            } else {
                // Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié.
                return redirect('login')->with('message', 'Veuillez vous connecter...');
            }
        }


        

        /**
         * Affiche la liste des utilisateurs supprimés.
         *
         * Cette fonction récupère la liste des utilisateurs ayant le rôle "Départ" (c'est-à-dire les utilisateurs supprimés) depuis la base de données et les affiche dans une vue dédiée. Elle utilise la pagination pour afficher les utilisateurs par groupe.
         *
         * @return \Illuminate\View\View Vue affichant la liste des utilisateurs supprimés.
         */
        public function showDeletedUsers()
        {
            if (auth()->check()) {
                // Récupérer les utilisateurs ayant le rôle "Départ" et les paginer.
                $users = User::where('Role', 'Départ')->get();

                // Afficher la vue des utilisateurs supprimés.
                return view('User/deleted', ['users' => $users , 'message'=>'']);
            
            } else {
                
                // Rediriger vers la page de connexion en cas d'échec d'authentification.
                return redirect('login')->with('error', 'L\'authentification a échoué.');
            }
        }

        /**
         * Recherche des utilisateurs en fonction des critères de recherche.
         *
         * Cette fonction effectue une recherche dans la base de données en fonction des critères de recherche fournis dans la requête HTTP.
         *
         * @param \Illuminate\Http\Request $request La requête HTTP contenant les critères de recherche.
         * @return \Illuminate\Http\Response Une réponse HTTP contenant les résultats de la recherche au format JSON.
         */
        public function searchUsers(Request $request){
            
            $users = User::where('Nom','Like','%'.$request->search.'%')->
            orWhere('Prenom','Like','%'.$request->search.'%')->
            orWhere('Site','Like','%'.$request->search.'%')->
            orWhere('Service','Like','%'.$request->search.'%')->
            orWhere('email','Like','%'.$request->search.'%')->orWhere('Date_Embauche','Like','%'.$request->search.'%')->get();
            
            $output="";
            
            foreach ($users as $user) {
                
                if ($user->Role != 'Départ') {
                    
                    $output .= '<tr>
                        <td>' . $user->Nom . '</td>
                        <td>' . $user->Prenom . '</td>
                        <td>' . $user->email . '</td>
                        <td>' . $user->Service . '</td>
                        <td>' . $user->Role . '</td>
                        <td>' . $user->Site . '</td>
                        <td class="op">
                            <button class="operation"  onclick="window.location.href = \'' . route('showUser', ['id' => $user->id]) . '\';">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Détails
                            </button>
                        </td>
                        <td class="op">
                            <button class="operation"  onclick="window.location.href = \'' . route('updateUser', ['id' => $user->id]) . '\';">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                Modifier
                            </button>
                        </td>';
            
                    if (Auth::user()->Role === 'Admin') {
                        
                        $output .= '<td class="op">
                            <button class="operation"  onclick="if (confirm(\'Êtes-vous sûr de supprimer ..?\')) window.location.href = this.getAttribute(\'data-href\');"
                                data-href="' . route('deleteUser', ['id' => $user->id]) . '">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                                </svg>
                                Supprimer
                            </button>
                        </td>';
                    }
            
                    $output .= '</tr>';
                }
            }            
            return response($output);
        }
        

        /**
         * Recherche des utilisateurs supprimés en fonction des critères de recherche.
         *
         * Cette fonction effectue une recherche dans la base de données des utilisateurs supprimés en fonction des critères de recherche fournis dans la requête HTTP.
         *
         * @param \Illuminate\Http\Request $request La requête HTTP contenant les critères de recherche.
         * @return \Illuminate\Http\Response Une réponse HTTP contenant les résultats de la recherche au format JSON.
         */
        public function searchDeletedUsers(Request $request){

            $users = User::where('Nom','Like','%'.$request->search.'%')->
            orWhere('Prenom','Like','%'.$request->search.'%')->
            orWhere('Site','Like','%'.$request->search.'%')->
            orWhere('Service','Like','%'.$request->search.'%')->
            orWhere('email','Like','%'.$request->search.'%')->
            orWhere('Date_Embauche','Like','%'.$request->search.'%')->get();
            
            $output="";

            foreach ($users as $user) {

                if ($user->Role = 'Départ') {
                    
                    $output .= '<tr>
                        <td>' . $user->Nom . '</td>
                        <td>' . $user->Prenom . '</td>
                        <td>' . $user->email . '</td>
                        <td>' . $user->Service . '</td>
                        <td>' . $user->Site . '</td>
                        <td class="op">
                            <button class="operation"  onclick="window.location.href = \'' . route('showUser', ['id' => $user->id]) . '\';">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Détails
                            </button>
                        </td>';
            
                    if (Auth::user()->Role === 'Admin') {
                        
                        $output .= '<td class="op">
                            <button class="operation"  onclick="if (confirm(\'Êtes-vous sûr de supprimer ..?\')) window.location.href = this.getAttribute(\'data-href\');"
                                data-href="' . route('deleteUser', ['id' => $user->id]) . '">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                                </svg>
                                Supprimer
                            </button>
                        </td>';
                    }
            
                    $output .= '</tr>';
                }
            }            
            return response($output);
        }

        /**
         * Récupère les valeurs nécessaires pour le formulaire d'ajout d'utilisateur.
         *
         * Cette fonction récupère les sites disponibles et d'autres valeurs spécifiques depuis la base de données
         * pour les utiliser dans le formulaire d'ajout d'utilisateur.
         *
         * @return \Illuminate\View\View La vue du formulaire d'ajout d'utilisateur avec les données nécessaires.
         */
        public function fetchUserFormValues(){

            $sites= DB::table('admins')
                ->select('Site') // Specify the column you want distinct values from
                ->whereNotNull('Site')
                ->where('Qui','user')
                ->distinct()
                ->get();

            $values=Admin::where('Qui','materiel')->get();

            return view('User/addUser',['sites'=>$sites , 'values'=>$values]);
    
        }

    public function index()
    {
    $users = User::all();
    return view('User.userDataTable', ['users'=>$users , 'message' => '']);
    }

}
