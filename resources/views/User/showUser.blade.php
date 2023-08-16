@extends('sidebar')
@section('content')
<section class="home">

    <div class="container">
        <div>
          <a href="/adduser" class="add-user">
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
                <th>id</th>
                <th>Matricule</th>
                <th>Adresse electronique</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Extension</th>
                <th>Role</th>
                <th>Service</th>
                <th>Ville</th>
                <th>Date d'embauche</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->Matricule}}</td>
                <td>{{$user->Email}}</td>
                <td>{{$user->Nom}}</td>
                <td>{{$user->Prenom}}</td>
                <td>{{$user->extension}}</td>
                <td>{{$user->Role}}</td>
                <td>{{$user->Service}}</td>
                <td>{{$user->Ville}}</td>
                <td>{{$user->Date_Embauche}}</td>
              </tr>
            </tbody>
          </table>
      
    </div>
<style>

.table-auto{
  background-color: whitesmoke;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
  display: block;
  width: 100%;
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