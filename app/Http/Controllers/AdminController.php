<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function saveValues(Request $request)
{       
        $admin = Admin::create([
        'Qui' => $request->input('selected'),
        'TypeProduit'=> $request->input('type'),
        'Marque'=> $request->input('marque'),
        'Choix'=> $request->input('choix'),
        'Foutnisseur'=> $request->input('fournisseur'),
        'emplacement'=> $request->input('stock'),       
        'Service'=> $request->input('service'),
        'Site'=> $request->input('site'), 
        ]);
        $response = "succes";

    return response($response);
}


}
