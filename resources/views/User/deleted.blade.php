@extends('sidebar')
@section('content')
<section class="home">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
        <input type="search" name="search" id="search" class="form-control" placeholder="rechercher Materiels"
                    style="width:100%;padding : 5px; margin-bottom:10px;">
        <table class="table-auto" border="1px solid black" >
            <thead>
              <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Service</th>
                <th>Site</th>
                <th>Detailles</th>
              </tr>
            </thead>
            <tbody id="Content" class="searchData"></tbody>
            <tbody class="mainData">
              @foreach ($users as $user)
              <tr>
                <td>{{$user->Nom}}</td>
                <td>{{$user->Prenom}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->Service}}</td>
                <td>{{$user->Site}}</td>
                  <td class="op">
                    <button class="operation"
                        onclick="window.location.href = '{{ route('showUser', ['id' => $user->id]) }}';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#101357"
                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path
                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        Detailles
                    </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      
    </div>
    <div class="pagination-links">
      {{ $users->links() }}
  </div>
</section>
<script type="text/javascript">
  $('#search').on('keyup', function() {
      $value = $(this).val();
      if ($value) {
          $('.mainData').hide();
          $('.searchData').show();
      } else {
          $('.mainData').show();
          $('.searchData').hide();
      }
      $.ajax({
          type: 'get',
          url: '{{ URL::to('searchDeletedUser') }}',
          data: {
              'search': $value
          },
          success: function(data) {
              console.log(data);
              $('#Content').html(data);
          }
      });
  })
</script>
<style>
.table-auto {
            background-color: whitesmoke;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
            display: block;
            text-align: center;
            overflow: scroll;
            cursor: pointer;
            width: 100%;

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
        border-bottom: 2px double black
    }
    .home{
  display: flex;
  flex-direction: column;
}
    .pagination-links{
  padding-top: 20px;
}
.container {
            height: 700px;
            width: 70%;
            /* Adjust the height as needed */
            overflow-y: auto;
            /* Add scroll if content exceeds container height */
        }  
        .operation {
            color: white;
            background-color: #019455;
            font-weight: bold;
            padding: 2px;
            margin: 2px;
            border-radius: 3px;

        }
        .operation:hover {
            text-decoration: none;
            color: #fff;
            background-color: #037d48;
        }
</style>

@endsection