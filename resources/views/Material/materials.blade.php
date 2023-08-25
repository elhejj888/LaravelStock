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
                <th class="thh">Type</th>
                <th class="thh">Marque</th>
                <th class="thh">Tag</th>
                <th class="thh">Etat</th>
                <th class="thh">Date d'achat</th>
                <th class="thh">Emplacement</th>
                <th class="thh">Site</th>
                <th class="thh">Modifier</th>
                @if(Auth::user()->Role === 'Admin')
                <th class="thh">Supprimer</th>
              @endif
                <th class="thh">Affecter</th>
                <th class="thh">Detailles</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($materials as $material)
              @if ($material->etat != 'rupture')
              <tr>
                
                <td>{{$material->TypeProduit}}</td>
                <td>{{$material->Marque}}</td>
                <td>{{$material->Tag}}</td>
                <td>{{$material->etat}}</td>
                <td>{{$material->DateAchat}}</td>
                <td>{{$material->Emplacement}}</td>
                <td>{{$material->Site}}</td>
                <td class="op"><a class="operation" href="{{ route('updateMaterial', ['id' => $material->id]) }}" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#101357" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a></td>
                  @if(Auth::user()->Role === 'Admin')
                <td class="op"><a class="operation" href="{{ route('deleteMaterial', ['id' => $material->id]) }}"onclick="return confirm('êtes-vous sûr de supprimer ..?');" style="text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg></a></td>
                  @endif
                  <td class="op"><a class="operation" href="" onclick="showtr()"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#101357" class="bi bi-send-plus" viewBox="0 0 16 16" style="text-decoration: none;">
                      <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                      <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
                    </svg></a></td>
                    <td class="op"><a class="operation" href="{{ route('showMaterial', ['id' => $material->id]) }}" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#101357" class="bi bi-plus-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                      </a></td>
                
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="pagination-links">
      {{ $materials->links() }}
  </div>
</section>
<script>
  function showtr(){
    const matricule = prompt ("Entrer le Matricule ..!");  
    if (matricule !== null) {
            // Send the value to the Laravel controller using AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route('storeMatricule') }}', // Replace with your route
                data: {
                    _token: '{{ csrf_token() }}',
                    matricule: matricule
                }
            });
        }
  }
  </script>
<style>

.table-auto{
  background-color: whitesmoke;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
  display: block;
  text-align: center;

}


th{
  background-color: #019455;
  color:#fff;
  font-weight: 500;
  height: 50px;

}

.add-button{
  height: 10%;
}
.home{
  display: flex;
  flex-direction: column;
}
.pagination-links{
  padding-top: 20px;
}
.operation{
  text-decoration: none;
  color: #101357;
}
.operation:hover{
  text-decoration: none;
  color: #fff;
}
.op:hover{
  background-color: #019455;
  color: #fff;
}

   
</style>

@endsection