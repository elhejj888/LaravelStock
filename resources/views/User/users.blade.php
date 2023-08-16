@extends('sidebar')
@section('content')
<section class="home">

    <div class="container">
        <div>
          <a href="adduser" class="add-user">
           <div class="add-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="auto" fill="#019455" class="bi bi-person-add" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
              <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
            </svg>
            </div>
          </a>
        </div>
        <table class="table-auto" border="1px solid black" >
            <thead>
              <tr>
                <th class="thh">Matricule</th>
                <th class="thh">Email</th>
                <th class="thh">Nom</th>
                <th class="thh">Prenom</th>
                <th class="thh">Service</th>
                <th class="thh">Ville</th>
                <th class="thh">Role</th>
                <th class="thh">Modifier</th>
                <th class="thh">Supprimer</th>
                <th class="thh">Detailles</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              @if ($user->Role != 'Exclu')
              <tr>
                
                <td>{{$user->Matricule}}</td>
                <td>{{$user->Email}}</td>
                <td>{{$user->Nom}}</td>
                <td>{{$user->Prenom}}</td>
                <td>{{$user->Service}}</td>
                <td>{{$user->Ville}}</td>
                <td>{{$user->Role}}</td>
                <td class="op"><a class="operation" style="text-decoration: none;" href="{{ route('updateUser', ['id' => $user->id]) }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></a></td>
                <td class="op"><a class="operation" style="text-decoration: none;" href="{{ route('deleteUser', ['id' => $user->id]) }}"onclick="return confirm('êtes-vous sûr de supprimer ..?');">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                  </svg>
                  </a></td>
                <td class="op"><a class="operation" style="text-decoration: none;" href="{{ route('showUser', ['id' => $user->id]) }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
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
      {{ $users->links() }}
  </div>
</section>
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