<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\material;
use App\Models\User;


class MaterialController extends Controller
{
    function RetrieveMaterials(){
        $materials=material::orderBy('TypeProduit')->orderBy('etat')->simplePaginate(20);
        return view('Material/materials', ['materials'=>$materials]);
    }


    public function showMaterial($id)
    {
    $material = material::findOrFail($id);
    return view('Material/showMaterial', ['material' => $material]);
    }

    public function addMaterial(Request $request){

        $material = material::create(['Site'=>$request->input('site'),
            'Emplacement'=>$request->input('emplacement'),
            'DateAchat'=>$request->input('achat'),
            'N_Facture'=>$request->input('facture'),
            'fournisseur'=>$request->input('fournisseur'),
            'AdresseMac'=>$request->input('mac'),
            'Tag'=>$request->input('tag'),
            'Marque'=>$request->input('marque'),
            'etat'=>"Nouveau",
            'TypeProduit'=>$request->input('type')]);
            
            return redirect('/materials');
            
    
        }

    public function updateMaterial($id){
        $material = material::findOrFail($id);
        return view('Material/editMaterial', ['material' => $material]);
        }

    public function updateValues(Request $request ){
        $id = $request->input('id');
        $material = material::findOrFail($id);

        $material->TypeProduit = $request->input('type');
        $material->Marque = $request->input('marque');
        $material->Tag = $request->input('tag');
        $material->AdresseMac = $request->input('mac');
        $material->etat = $request->input('etat');
        $material->N_Facture = $request->input('facture');
        $material->DateAchat = $request->input('achat');
        $material->fournisseur = $request->input('fournisseur');
        $material->Emplacement = $request->input('emplacement');
        $material->Site = $request->input('site');

        $material->save();

        return redirect('/materials')->with('success', 'Material updated successfully');
        }

        public function deletedvalues(){
            $materials = material::where('etat','rupture')->orderBy('TypeProduit')->orderBy('Site')->simplePaginate(20);
            return view('Material/deleted',['materials'=>$materials]);
        }

        public function deleteMaterial($id){
            $material = material::findOrFail($id);
            $material->etat="rupture";
            $material->save();

            return redirect('/materials');
        }
        public function home(){
        $materialCounts = [];

        $types = ['Ordinateur', 'Casque', 'Materiel reseau', 'Telephone', 'Ecran'];

        foreach ($types as $type) {
            $typeCounts = [];

            $statuses = ['Disponible', 'Assigne', 'maintenance', 'rupture'];

            foreach ($statuses as $status) {
                $count = material::where('TypeProduit', $type)
                    ->where('etat', $status)
                    ->count();

                $typeCounts[$status] = $count;
            }

            $materialCounts[$type] = $typeCounts;
        }
        $ruptureCount = material::where('etat', 'rupture')->count();
        $maintenanceCount = material::where('etat', 'maintenance')->count();

        $userCounts = [
            'autorisé' => User::where('Role', 'Autorisé')->count(),
            'Restreint' => User::where('Role', 'Restreint')->count(),
            'Exclu' => User::where('Role', 'Exclu')->count(),
        ];

        return view('home', compact('materialCounts', 'userCounts','maintenanceCount','ruptureCount','maintenanceCount'));
}


}
