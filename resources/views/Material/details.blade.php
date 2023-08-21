@extends('sidebar')
@section('content')
<section class="home">

    <div class="container">
        <div>
          <a href="/addmaterial" class="add-user">
           <div class="add-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="auto" fill="#019455" class="bi bi-send-plus" viewBox="0 0 16 16">
                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
              </svg>
            </div>
          </a>
        </div>
        <table class="table-auto" border="1px solid black" >
            <thead>
              <tr>
                <td class="t1">Type</td>
                <td>{{$material->TypeProduit}}</td>
                <tr>
                    <td class="t1">Marque</td>
                    <td>{{$material->Marque}}</td>
                </tr>
                <tr>
                    <td class="t1">Tag</td>
                    <td>{{$material->Tag}}</td>
                </tr>
                <tr>
                    <td class="t1">Adresse Mac</td>
                    <td>{{$material->AdresseMac}}</td>
                </tr>
                <tr>
                    <td class="t1">Etat</td>
                    <td>{{$material->etat}}</td>
                </tr>
                <tr>
                    <td class="t1">Numero de facture</td>
                    <td>{{$material->N_Facture}}</td>
                </tr>
                <tr>
                    <td class="t1">Date d'achat</td>
                    <td>{{$material->DateAchat}}</td>
                </tr>
                <tr>
                    <td class="t1">Fournisseur</td>
                    <td>{{$material->Fournisseur}}</td>
                </tr>
                <tr>
                    <td class="t1">Emplacement</td>
                    <td>{{$material->Emplacement}}</td>
                </tr>
                <tr>
                    <td class="t1">Site</td>
                    <td>{{$material->Site}}</td>
                </tr>
                <tr>
                    <td class="t1">Date d'ajout</td>
                    <td>{{$material->created_at}}</td>
                </tr>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                
                
              </tr>
            </tbody>
          </table>
      
    </div>
<style>

.table-auto{
  background-color: whitesmoke;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
  display: block;

}
    .t1{
      background-color: rgb(242, 242, 242);
        color:green;
        font-weight: bold;
    }
    .add-button{
        height: 10%;
        border-bottom: 2px double black
    }
   
</style>

@endsection