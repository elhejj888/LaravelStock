<?php
use App\Models\material;


Class indexComponent extends Component{
    public function delete($id){
        $materiel = material::where('id', $id)->first();
        $material->delete();

        session()->flash('message','Supprime');
    }
}