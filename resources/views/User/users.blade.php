@extends('sidebar')
@section('content')
<section class="home">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="container">
        <div>
           <div class="add-button">
            <a href="adduser" class="add-user">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="auto" fill="#019455" class="bi bi-person-add" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
              <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
            </svg>
          </a>

            </div>
        </div>
        <div class="search">
          <input type="search" name="search" id="search" class="form-control" placeholder="rechercher Utilisateur" style="width:100%;padding : 5px; margin-bottom:10px;">
        </div>
        <table class="table-auto" border="1px solid black ; " >
            <thead>
              <tr>
                <th class="thh">Nom</th>
                <th class="thh">Prenom</th>
                <th class="thh">Email</th>
                <th class="thh">Service</th>
                <th class="thh">Role</th>
                <th class="thh">Site</th>
                <th class="thh">Detailles</th>
                <th class="thh">Modifier</th>
                @if(Auth::user()->Role === 'Admin')
                <th class="thh">Supprimer</th>
                @endif
              </tr>
            </thead>
            <tbody id="Content" class="searchData"></tbody>
            <tbody class="mainData">
              @foreach ($users as $user)
              @if ($user->Role != 'Départ')
              <tr>
                <td>{{$user->Nom}}</td>
                <td>{{$user->Prenom}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->Service}}</td>
                <td>{{$user->Role}}</td>
                <td>{{$user->Site}}</td>
                <td class="op">
                  <button class="operation"  onclick="window.location.href = '{{ route('showUser', ['id' => $user->id]) }}';">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                      Détails
                  </button>
              </td>
                <td class="op">
                  <button class="operation"  onclick="window.location.href = '{{ route('updateUser', ['id' => $user->id]) }}';">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                      Modifier
                  </button>
              </td>
              @if(Auth::user()->Role === 'Admin')
              <td class="op">
                  <button class="operation"  onclick="if (confirm('Êtes-vous sûr de supprimer ..?')) window.location.href = this.getAttribute('data-href');"
                      data-href="{{ route('deleteUser', ['id' => $user->id]) }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                          <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                          <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                      </svg>
                      Supprimer
                  </button>
              </td>
              @endif
                  
                
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
<script type="text/javascript">
$('#search').on('keyup',function(){
  $value = $(this).val();
  if($value){
    $('.mainData').hide();
    $('.searchData').show();
  }
  else{
    $('.mainData').show();
    $('.searchData').hide();
  }
  $.ajax({
    type:'get',
    url:'{{URL::to('searchUser')}}',
    data:{'search':$value},
    success:function(data){
      console.log(data);
      $('#Content').html(data);
    }
  });
}
)
</script>
<style>

.table-auto{
  background-color: whitesmoke;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
  display:block;
  text-align: center;

}


th {
  position: sticky;
  top: 0;
  background-color: #019455;
  color: #fff;
  font-weight: 500;
  height: 50px;
}

.add-button{
  height: 10%;
}
table{
  width: 100%;
  table-layout: fixed;
}

.home{
  display: flex;
  flex-direction: column;
}
.pagination-links{
  padding-top: 20px;
}
.operation{
  color: white;
  background-color: #019455;
  font-weight:bold;
  padding: 2px;
  margin: 2px;
  border-radius: 3px;
  
}
.container {
  height: 700px; /* Adjust the height as needed */
  overflow-y: auto; /* Add scroll if content exceeds container height */
}
.operation:hover{
  text-decoration: none;
  color: #fff;
  background-color: #03693d;
}

   
</style>

@endsection