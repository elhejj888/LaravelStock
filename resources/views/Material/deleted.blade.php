@extends('sidebar')
@section('content')
<section class="home">

    <div class="container">
        <div>
          <a href="addmaterial" class="add-user">
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
                <th>Type</th>
                <th>Marque</th>
                <th>Tag</th>
                <th>Etat</th>
                <th>Numero de facture</th>
                <th>Date d'achat</th>
                <th>Emplacement</th>
                <th>Site</th>
                <th>Detailles</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($materials as $material)
              <tr>
                
                <td>{{$material->TypeProduit}}</td>
                <td>{{$material->Marque}}</td>
                <td>{{$material->Tag}}</td>
                <td>{{$material->etat}}</td>
                <td>{{$material->N_Facture}}</td>
                <td>{{$material->DateAchat}}</td>
                <td>{{$material->Emplacement}}</td>
                <td>{{$material->Site}}</td>


                    </a></td>
                    <td><a href="{{ route('showMaterial', ['id' => $material->id]) }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                      </a></td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
      
    </div>
<style>

.table-auto{
  background-color: whitesmoke;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
  display: block;

}
    th{
      background-color: rgb(184, 184, 184);
        color:green;
    }
    .add-button{
        height: 10%;
        border-bottom: 2px double black
    }
   
</style>

@endsection