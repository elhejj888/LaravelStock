<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historisation;

class HistoriqueController extends Controller
{
    public function retrieveMaterialHistorisation(){
        $historisations = Historisation::orderByDesc("created_at")->simplePaginate(10);
    
        return view('Historisation/historique', ['historisations'=>$historisations , 'message'=>''] );
    }
    public function findMaterial(Request $request){
        $historisations = Historisation::where('user_id','Like','%'.$request->search.'%')->
                orWhere('operation','Like','%'.$request->search.'%')->
                orWhere('changes','Like','%'.$request->search.'%')->get();
            $output="";
                foreach ($historisations as $historisation) {
                    
                        $output .= '<tr>
                            <td>' . $historisation->user_id ." : ".$historisation->FullName. '</td>

                            <td>' . $historisation->edited_id . '</td>
                            <td>' . $historisation->operation . '</td>
                            <td>' . $historisation->changes . '</td>
                            <td>' . $historisation->created_at . '</td>
                            
                            </tr>';
                    
        }
        return response($output);
    }
    public function retrieveUserHistorisation(){
        $historisations = Historisation::orderByDesc("created_at")->simplePaginate(10);
        return view('Historisation/historique', ['historisations'=>$historisations , 'message'=>''] );
    }
    public function find(Request $request){
        $historisations = Historisation::where('user_id','Like','%'.$request->search.'%')->
                orWhere('operation','Like','%'.$request->search.'%')->
                orWhere('changes','Like','%'.$request->search.'%')->get();
            $output="";
                foreach ($historisations as $historisation) {
                    
                        $output .= '<tr>
                            <td>' . $historisation->user_id . '</td>
                            <td>' . $historisation->edited_id . '</td>
                            <td>' . $historisation->operation . '</td>
                            <td>' . $historisation->changes . '</td>
                            <td>' . $historisation->created_at . '</td>
                            
                            </tr>';
                    
        }
        return response($output);
    }
}
