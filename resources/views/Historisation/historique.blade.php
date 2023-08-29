@extends('sidebar')
@section('content')
    <section class="home">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <div class="container">
          <input type="search" name="search" id="search" class="form-control" placeholder="rechercher Utilisateur"
          style="padding : 5px; margin-bottom:10px;">
            <div class="search">
                
            </div>
            <table class="table-auto" border="1px solid black ; ">
                <thead>
                    <tr>
                        <th class="thh">Utilisateur</th>
                        <th class="thh">Sur qui</th>
                        <th class="thh">Operation</th>
                        <th class="thh">modifications</th>
                        <th class="thh">date des modifications</th>
                    </tr>
                </thead>
                <tbody id="Content" class="searchData"></tbody>
                <tbody class="mainData">
                    @foreach ($historisations as $historisation)
                        <tr>
                            @if($historisation->FullName != "Systeme de Connexion" || $historisation->FullName != "Inconnu")
                            <td><a
                                    href="{{ route('showUser', ['id' => $historisation->user_id]) }}">{{ $historisation->FullName }}</a>
                            </td>
                            @else
                            <td>Connexion</td>
                            @endif
                            <td>
                              @if($historisation->type =="materiel")
                              <a
                                    href="{{ route('showMaterial', ['id' => $historisation->edited_id]) }}">{{ $historisation->MaterialType }}</a>
                              @else
                              <a
                              href="{{ route('showUser', ['id' => $historisation->edited_id]) }}">{{ $historisation->Nom }}</a>
                            @endif      
                            </td>
                            <td>{{ $historisation->operation }}</td>
                            <td>{{ $historisation->changes }}</td>
                            <td>{{ $historisation->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        <div class="pagination-links">
            {{ $historisations->links() }}
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
                url: '{{ URL::to('searchHistoriqueMaterial') }}',
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

        }
        a{
            text-decoration: none;
            color: black;            
        }
        a:hover{
            color: white;
            background-color: #019455;
        }

        th {
            position: sticky;
            top: 0;
            background-color: #019455;
            color: #fff;
            font-weight: 500;
            height: 50px;
        }

        .add-button {
            height: 10%;
        }

        .home {
            display: flex;
            flex-direction: column;
        }

        .pagination-links {
            padding-top: 20px;
        }

        .operation {
            color: white;
            background-color: #019455;
            font-weight: bold;
            padding: 2px;
            margin: 2px;
            border-radius: 3px;

        }

        .container {
            height: 700px;
            width: 87%;
            /* Adjust the height as needed */
            overflow-y: auto;
            /* Add scroll if content exceeds container height */
        }

        .operation:hover {
            text-decoration: none;
            color: #fff;
            background-color: #037d48;
        }
    </style>
      
         
@endsection
