<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function RetrieveUsers(){
        $users = User::orderBy('Ville')->simplePaginate(20);
        return view('User/users',['users'=>$users]);
    }
    public function show($id)
    {
    $user = User::findOrFail($id);
    return view('User/showUser', ['user' => $user]);
    }

    public function addUser(Request $request){
        
    $user = User::create(['Nom' => $request->input('Nom'),
        'Prenom'=>$request->input('Prenom'),
        'Email'=>$request->input('Email'),
        'Password'=>"test", 
        'extension'=>$request->input('Extension'),
        'Matricule'=>$request->input('Matricule'),
        'Role'=>$request->input('Role'),
        'Service'=>$request->input('Service'),
        'Ville'=>$request->input('Site'),
        'Date_Embauche'=>$request->input('DateEmbauche')
        ]);
        
        return redirect('/users');

    }

    public function updateUser($id){

        $user = User::findOrFail($id);
        
        return view('User/editUser', ['user' => $user]);

        }

    public function updateValues(Request $request ){
        $id = $request->input('id');
        $user = User::findOrFail($id);

        $user->Matricule = $request->input('Matricule');
        $user->Email = $request->input('Email');
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->extension = $request->input('Extension');
        $user->Service = $request->input('Service');
        $user->Ville = $request->input('Site');
        $user->Date_Embauche = $request->input('DateEmbauche');
        $user->Role = $request->input('Role');

        $user->save();

        return redirect('/users')->with('success', 'User updated successfully');
        }


        public function deleteUser($id){
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/users');

        }

        public function deletedvalues(){
            $users = User::where('Role','Exclu')->simplePaginate(20);
            return view('User/deleted',['users'=>$users]);
        }
        
    

}
