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



class AuthController extends Controller
{
    public function sendPassword(Request $request)
    {
        $email = Str::lower($request->input('Email'));
        $user = User::where('email', $email)->first();

        if ($user->Role == "Autorisé" || $user->Role == "Admin") {
            // Generate a temporary password and send it to the user's email
            $temporaryPassword = Str::random(12);
            // Send the password to the user's email using your email service
            Mail::to($email)->send(new Login($temporaryPassword));
            // Store the hashed password in the database
            $user->update(['password' => Hash::make($temporaryPassword)]);
            $currentDateTime = Carbon::now();
            $futureDateTime = $currentDateTime->addMinutes(5);
            return view('Login/password', ['user' => $user , 'Ftime'=> $futureDateTime]);
        }
        else {
            return redirect('login')->with("alert","Input failed , Adresse n'exsite pas");
        }

    }


    public function authenticate(Request $request)
{
    $request->validate([
        'Email' => 'required',
        'password' => 'required',
    ]);
    
    $credentials = $request->only('Email', 'password');
    $Ftime = $request->input('Ftime');
    $currentDateTime = Carbon::now();
    
    /* if ($currentDateTime->isAfter($Ftime)) {
        $user->update(['Password' => Str::random(60)]);
        return redirect('login')->with('error', 'Password reset due to expiration. Please log in again.');
    } */
    if (Auth::attempt($credentials)) {
        return redirect('/home')->with('success', 'Authenticated successfully.');
    }
    else {
        return redirect('login')->with('error', 'Authentication failed.');
    }
}


public function logout()
{
    Auth::logout(); // Logout the currently authenticated user
    
    return redirect('/login'); // Redirect to the login page or any other desired page
}
}
