<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


public function getSites()
{
    $sites= DB::table('admins')
                ->select('Site') // Specify the column you want distinct values from
                ->whereNotNull('Site')
                ->where('Qui','materiel')
                ->distinct()
                ->get();

    return response()->json($sites);
}

public function getUserSites()
{
    $sites= DB::table('admins')
                ->select('Site') // Specify the column you want distinct values from
                ->whereNotNull('Site')
                ->where('Qui','user')
                ->distinct()
                ->get();

    return response()->json($sites);
}

public function getTypes()
{
    if (auth()->check()) {
    $types= DB::table('admins')
                ->select('TypeProduit') // Specify the column you want distinct values from
                ->whereNotNull('TypeProduit')
                ->where('Qui','materiel')
                ->distinct()
                ->get();

    return response()->json($types);
    }
    else {
        return redirect('login')->with('error', 'Authentication failed.');
    }
}

public function getEmplacements(Request $request)
{
    if (auth()->check()) {
    $site = $request->input('site');
    $emplacements = Admin::where('Site', $site)
        ->whereNotNull('Emplacement') // Filter out NULL values
        ->distinct()
        ->pluck('Emplacement', 'Emplacement')
        ->toArray();

    return response()->json($emplacements);}
    else {
        return redirect('login')->with('error', 'Authentication failed.');
    }
}


public function getMarque(Request $request)
{
    if (auth()->check()) {

    $type = $request->input('type');
    $marques = Admin::where('TypeProduit', $type)
        ->whereNotNull('Marque') // Filter out NULL values
        ->distinct()
        ->pluck('marque', 'Marque')
        ->toArray();

    $choix = Admin::where('TypeProduit', $type)
        ->whereNotNull('Choix') // Filter out NULL values
        ->distinct()
        ->pluck('choix', 'Choix')
        ->toArray();    
        
    return response()->json(['marques'=>$marques,'choix'=>$choix]);
} else {
    return redirect('login')->with('error', 'Authentication failed.');
}
}

public function getServices(Request $request)
{
    if (auth()->check()) {

    $site = $request->input('site');
    $services = Admin::where('Site', $site)
        ->whereNotNull('Service') // Filter out NULL values
        ->distinct()
        ->pluck('Service', 'Service')
        ->toArray();

    return response()->json($services);
} else {
    return redirect('login')->with('error', 'Authentication failed.');
}
}

public function getSitesAndEmplacements()
{
    if (auth()->check()) {

    $marques = Admin::where('Qui', 'materiel')
        ->whereNotNull('Site') // Filter out NULL values
        ->distinct()
        ->pluck('Site', 'Marque')
        ->toArray();

    $choix = Admin::where('TypeProduit', $type)
        ->whereNotNull('Choix') // Filter out NULL values
        ->distinct()
        ->pluck('choix', 'Choix')
        ->toArray();    

    return response()->json(['marques'=>$marques,'choix'=>$choix]);
} else {
    return redirect('login')->with('error', 'Authentication failed.');
}
}

}