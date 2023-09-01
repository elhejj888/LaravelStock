@extends('sidebar')
@section('content')
<section class="home">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
        <p style="text-align: center;color:red;font-size:20px;font-weight:bold;">
            {{ session('message') }}

    </p>
        <input type="search" name="search" id="search" class="form-control" placeholder="rechercher Materiels"
                    style="width:100%;padding : 5px; margin-bottom:10px;">
        <table class="table-auto" border="1px solid black" >
            <thead>
              <tr>
                <th>Type</th>
                <th>Marque</th>
                <th>Probleme</th>
                <th>Date d'achat</th>
                <th>Emplacement</th>
                <th>Site</th>
                <th>Detailles</th>
                <th>Réparé</th>
                
              </tr>
            </thead>
            <tbody id="Content" class="searchData"></tbody>
            <tbody class="mainData">
              @foreach ($materials as $material)
              <tr>
                
                <td>{{$material->TypeProduit}}</td>
                <td>{{$material->Marque}}</td>
                <td>{{$material->description}}</td>
                <td>{{$material->DateAchat}}</td>
                <td>{{$material->Emplacement}}</td>
                <td>{{$material->Site}}</td>


                    </a></td>
                    <td class="op">
                      <button class="operation"
                          onclick="window.location.href = '{{ route('showMaterial', ['id' => $material->id]) }}';">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#fff"
                              class="bi bi-plus-circle" viewBox="0 0 16 16">
                              <path
                                  d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                              <path
                                  d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                          </svg>
                          Detailles
                      </button>
                  </td>
                  <td class="op">
                    <button id="open-button" class="operation" data-modal="modal-{{ $material->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                          </svg>
                        Réparé
                    </button>
                    <dialog class="modal" id="modal-{{ $material->id }}" style="margin:auto; align-content:center; width:32%;">
                        <div>
                        <h1>Etat de Stock</h1>
                        <form action="/repareMaterial" method="POST" >
                            @csrf
                            <input type="text" name="id" value="{{ $material->id }}" style="display: none">
                            <div class="inputs">
                                <label for="etat" >Date de Sortie : </label>
                        
                                <table>
                                    <tr>
                                        <td><label>Emplacement :</label>
                                            </td>
                                            <td>
                                    <select name="emplacement">
                                        <option value="2eme etage">2eme etage</option>
                                        <option value="5eme etage">5eme etage</option>
                                        <option value="7eme etage">7eme etage</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp</td>
                                    <td>&nbsp</td>
                                    </tr>
                                <tr>
                                    <td><label>Site : </label></td>
                                    <td>
                                    <select name="site">
                                        <option value="Casablanca">Casablanca</option>
                                        <option value="Oujda">Oujda</option>
                                    </select>
                                    </td>
                                    </tr>
                                </table>
                            </div>
                        <button id="submit" type="submit">Valider</button>
                    </form>  
    
    
                        <div>
                        <div class="additional-content" data-material-id="{{ $material->id }}">
                        </div>
                        <button class="button close-button" id="Operation" >
                            Close
                        </button>
                </td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
      
    </div>
    <script>
        const openButtons = document.querySelectorAll('#open-button');
        const closeButtons = document.querySelectorAll('.close-button');
        const dialogs = document.querySelectorAll('.modal');
    
        openButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal');
                const modal = document.getElementById(modalId);
                modal.showModal();
            });
        });
    
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('dialog');
                modal.close();
            });
        });
    </script>
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
              url: '{{ URL::to('searchDeletedMaterial') }}',
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
    .modal h1{
        background-color: #019455;
        color: #fff;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 40px;
        padding-top: 10px;
        height: 50px;
        text-align: center;
    }
    .modal::backdrop{
        background-color: #1c5d4161;
    }
    .modal {
        background-color: rgb(243, 245, 241);
        text-align: center;
        align-items: center;
        margin: auto;
        height: 300px;
        width: 500px;
        border-radius: 10px;
        border: 2px solid black;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
        position: absolute;
        top: 0px;

    }
    #Operation{
        background-color: #019455;
        color: #fff;   
        font-size: 20px;
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 50%;
    }
    #submit{
        background-color: #019455;
        color: #fff;   
        font-size: 20px;
        position: absolute;
        bottom: 0px;
        right: 0px;
        width: 50%;
    }
    .modal table{
        margin: auto;  
    }    
    

    .modal select{
        font-size: 17px;

    }
    .modal label{
        font-size: 17px;
    }
    .inputs{
        margin: auto;
        border-radius:10px;
        margin-top: 25px;

    }
    .area{
        margin-top: 25px;
        display: flex;
        align-items: center;
        justify-content: center; /* Horizontally center-align items */
    }
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