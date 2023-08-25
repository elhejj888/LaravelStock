<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Mail;

class UserController extends Controller
{
    function RetrieveUsers(){
        if (auth()->check()) {

        $users = User::orderBy('Ville')->orderBy('Service')->simplePaginate(30);
        return view('User/users',['users'=>$users]);
    }
    else
        return redirect('login')->with('error', 'Authentication failed.');

    }
    public function show($id)
    {
        if (auth()->check()) {
            $user = User::findOrFail($id);
            return view('User/showUser', ['user' => $user]);
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
        'Matricule'=>$request->input('Matricule'),
        'Role'=>$request->input('Role'),
        'Service'=>$request->input('Service'),
        'Ville'=>$request->input('Ville'),
        'password'=>"test",
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

        $user->Matricule = $request->input('Matricule');
        $user->email = $request->input('email');
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
        else{
            return redirect('login')->with('error', 'Authentication failed.');
        }
        }


        public function deleteUser($id){
            if (auth()->check()) {

            $user = User::findOrFail($id);
            $user->Role = "Exclu";
            $user->save();
            return redirect('/users');
            }
            else{
                return redirect('login')->with('error', 'Authentication failed.');
            }

        }

        public function deletedvalues(){
            if (auth()->check()) {
            $users = User::where('Role','Exclu')->orderBy('Ville')->orderBy('Service')->simplePaginate(20);
            return view('User/deleted',['users'=>$users]);
            }
            else{
                return redirect('login')->with('error', 'Authentication failed.');
            }
        }
        
    

}
