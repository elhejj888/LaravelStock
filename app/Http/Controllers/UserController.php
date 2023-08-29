<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Historisation;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function RetrieveUsers(){
        if (auth()->check()) {

        $users = User::orderBy('Site')->orderBy('Service')->simplePaginate(20);
        return view('User/users',['users'=>$users]);
    }
    else
        return redirect('login')->with('error', 'Authentication failed.');

    }
    public function show($id)
    {
        if (auth()->check()) {
            $historiques = Historisation::where('edited_id', $id)->where('type','user')->get();
            $user = User::findOrFail($id);
            return view('User/showUser', ['user' => $user , 'historiques' => $historiques]);
        }
        else{
            return redirect('login')->with('error', 'Authentication failed.');
        }
    }

    public function addUser(Request $request){
        if (auth()->check()) {

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
        
        return redirect('/users');
    }
    else{
        return redirect('login')->with('error', 'Authentication failed.');
    }

    }

    public function updateUser($id){
        if (auth()->check()) {

        $user = User::findOrFail($id);
        
        return view('User/editUser', ['user' => $user]);
    }
        else{
            return redirect('login')->with('error', 'Authentication failed.');
        }
        }

    public function updateValues(Request $request ){
        if (auth()->check()) {

        $id = $request->input('id');
        $user = User::findOrFail($id);

        $user->email = $request->input('email');
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->extension = $request->input('Extension');
        $user->Service = $request->input('Service');
        $user->Site = $request->input('Site');
        $user->Date_Embauche = $request->input('DateEmbauche');
        $user->Role = $request->input('Role');

        $user->save();

        return redirect('/users')->with('success', 'User updated successfully');
        }
        else{
            return redirect('login')->with('error', 'Authentication failed.');
        }
        }


        public function deleteUser($id){
            if (auth()->check()) {

            $user = User::findOrFail($id);
            $user->Role = "Départ";
            $user->save();
            return redirect('/users');
            }
            else{
                return redirect('login')->with('error', 'Authentication failed.');
            }

        }

        public function deletedvalues(){
            if (auth()->check()) {
            $users = User::where('Role','Départ')->orderBy('Site')->orderBy('Service')->simplePaginate(20);
            return view('User/deleted',['users'=>$users]);
            }
            else{
                return redirect('login')->with('error', 'Authentication failed.');
            }
        }
        
        public function searchUser(Request $request){
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
        
        public function searchDeletedUser(Request $request){
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

}
