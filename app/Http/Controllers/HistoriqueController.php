<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historisation;

class HistoriqueController extends Controller
{
    
    public function findMaterial(Request $request){
        $historisations = Historisation::where('user_id','Like','%'.$request->search.'%')->
                orWhere('operation','Like','%'.$request->search.'%')->
                orWhere('changes','Like','%'.$request->search.'%')->get();
            $output="";
                foreach ($historisations as $historisation) {
                    
                        $output .= '<tr>
                            <td>' .$historisation->FullName. '</td>
                            <td>' . $historisation->type . '</td>
                            <td>' . $historisation->operation . '</td>
                            <td>' . $historisation->changes . '</td>
                            <td>' . $historisation->created_at . '</td>
                            
                            </tr>';
                    
        }
        return response($output);
    }
    public function retrieveUserHistorisation(){
        $historisations = Historisation::where('changes', 'NOT LIKE', '%password%')
    
    ->leftJoin('materials', function ($join) {
        $join->on('historisations.edited_id', '=', 'materials.id')
             ->where('historisations.type', '=', 'materiel');
    })
    ->leftJoin('users', function ($join) {
        $join->on('historisations.edited_id', '=', 'users.id')
             ->where('historisations.type', '=', 'user');
    })
    ->select('historisations.*', 'materials.TypeProduit as MaterialType','users.Nom as Nom')
    ->orderByDesc('historisations.created_at')
    ->simplePaginate(15);

        return view('Historisation/historique', ['historisations'=>$historisations , 'message'=>''] );
    }
    public function find(Request $request){
        $historisations = Historisation::where('user_id','Like','%'.$request->search.'%')->
                orWhere('operation','Like','%'.$request->search.'%')->
                orWhere('FullName','Like','%'.$request->search.'%')->
                orWhere('changes','Like','%'.$request->search.'%')->get();
            $output="";
                foreach ($historisations as $historisation) {
                    
                        $output .= '<tr>
                            <td>' . $historisation->FullName . '</td>
                            <td>' . $historisation->type . '</td>
                            <td>' . $historisation->operation . '</td>
                            <td>' . $historisation->changes . '</td>
                            <td>' . $historisation->created_at . '</td>
                            
                            </tr>';
                    
        }
        return response($output);
    }
}
