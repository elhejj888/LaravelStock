<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\Login;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{
    public function sendPassword(Request $request)
    {
        if (!auth()->check()) {
        $email = Str::lower($request->input('Email'));
        $user = User::where('email', $email)->first();
        session(['temporary_email' => $email]);
        if($user){
        if ($user->Role == "Autorisé" || $user->Role == "Admin") {
            // Generate a temporary password and send it to the user's email
            $temporaryPassword = Str::random(12);
            // Send the password to the user's email using your email service
            Mail::to($email)->send(new Login($temporaryPassword));
            // Store the hashed password in the database
            $user->update(['password' => Hash::make($temporaryPassword)]);
            $currentDateTime = Carbon::now();
            $futureDateTime = $currentDateTime->addMinutes(5);
            return view('Login/password', ['user' => $user , 'Ftime'=> $futureDateTime , 'message'=>'']);
        }
        else {
            return redirect('login')->with("message","Vous n'avez pas le droit d'acces , Veuillez verifier avec votre Responsable");
        }
    }
        else {
            return redirect('login')->with("message","Vous n'avez pas le droit d'acces , Veuillez verifier avec votre Responsable");
        }
    }
 else {
    return redirect('home')->with('message', 'Veuiller vous Deconnecter pour changer le compte.');
}

    }

    public function authenticate(Request $request)
    {
        $request->session()->flush();
        if (!auth()->check()) {
            $request->validate([
                'Email' => 'required',
                'password' => 'required',
            ]);
    
            $credentials = $request->only('Email', 'password');
            $currentDateTime = Carbon::now();
            $email = $request->input('Email');
            $Ftime = $request->input('Ftime');
    
            if ($currentDateTime->isAfter($Ftime)) {
                $user = User::where('email', $email)->first();
                $user->update(['Password' => Str::random(60)]);
                return redirect('login')->with('message', 'Vous avez Dépassé 5 minutes, Veuillez Demander un Nouveau Code ..!');
            } else if (Auth::attempt($credentials)) {
                return redirect('/home')->with('message', '');
            } else {
                session(['temporary_email' => $email]);
                session(['Ftime' => $Ftime]);
    
                return redirect('/sendpassword')->with('message', 'Erreur de Connexion, Vérifiez votre Mot de passe !!');
            }
        } else {
            return redirect('home')->with('message', 'Veuillez vous Déconnecter pour changer le compte.');
        }
    }
    

public function checkPassword(){
    if(session('temporary_email'))
    return view('Login/password', ['email' => session('temporary_email') , 'message'=>'Erreur de Connexion , Verifier votre Mot de passe !!']);
    else return redirect('/login')->with('message', 'Erreur de Connexion , Entrer votre email !!');
}
public function logout(Request $request)
{
    $request->session()->flush();
    Auth::logout(); // Logout the currently authenticated user
    return redirect('/login')->with('message','Veuiller se connecter'); // Redirect to the login page or any other desired page
}
}
