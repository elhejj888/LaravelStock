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
        $user = User::where('Email', $email)->first();

        if ($user) {
            // Generate a temporary password and send it to the user's email
            $temporaryPassword = Str::random(12);
            // Send the password to the user's email using your email service
            Mail::to($email)->send(new Login($temporaryPassword));
            // Store the hashed password in the database
            $user->update(['Password' => $temporaryPassword]);
            $currentDateTime = Carbon::now();
            $futureDateTime = $currentDateTime->addMinutes(5);
            return view('Login/password', ['user' => $user , 'Ftime'=> $futureDateTime]);
        }
        else {
        echo "that's it";}
        return redirect('login')->with("alert","Input failed , Adresse n'exsite pas");
        

    }

    public function authenticate(Request $request)
    {
        //$credentials = $request->only('Email', 'password');
        $email = Str::lower($request->input('Email'));
        $password = $request->input('password');
        $Ftime = $request->input('Ftime');
        $currentDateTime = Carbon::now();
        $user = User::where('Email', $email)->first();
        if ($currentDateTime->isAfter($Ftime)) {
            $user->update(['Password' => Str::random(60)]);
            return redirect('login');
        }
        if ($user) {
            echo "that's it 1";
            if($user->Password == $password){
            // Authentication successful
            echo "that's it 2";
            return redirect('/home')->with('user',Auth::user());
        }
            else{
                echo "that's it 3";

                return view('errors/pass',['pass'=>$password]);
            }
        } else {
            // Authentication failed
            echo "that's it 4";
            return view('errors/email', ['error' => $email]);        
        }
    }
}
