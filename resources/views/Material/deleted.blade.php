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
        <div class="search">
            <p style="text-align: center;color:red;font-size:20px;font-weight:bold;">
                @if (session('message'))
                    {{ session('message') }}
                @else
                    {{ $message }}
                @endif

            </p>
        </div>
    <div class="container" id="container">
        <table id="example" class="display" >
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
                @if(Auth::user()->Role === 'Admin')
                <th>Mise en Sortie</th>
                @endif
                
              </tr>
            </thead>
            <tbody class="mainData">
              @foreach ($materials as $material)
                  @if ($material->etat == 'rupture')
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
                    <td class="op">
                      <button class="operation"
                          onclick="window.location.href = '{{ route('showMaterial', ['id' => $material->id]) }}';">
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
                  @if(Auth::user()->Role === 'Admin')
              <td class="op">
                  <button id="open-button" class="operation" data-modal="modal-{{ $material->id }}" >
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-folder-x" viewBox="0 0 16 16">
                        <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zm6.339-1.577A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                        <path d="M11.854 10.146a.5.5 0 0 0-.707.708L12.293 12l-1.146 1.146a.5.5 0 0 0 .707.708L13 12.707l1.146 1.147a.5.5 0 0 0 .708-.708L13.707 12l1.147-1.146a.5.5 0 0 0-.707-.708L13 11.293l-1.146-1.147z"/>
                      </svg>
                      Mise en Sortie
                  </button>
                  <dialog class="modal" id="modal-{{ $material->id }}" style="margin:auto; align-content:center; width:32%;">
                    <div>
                    <h1>Mise En Sortie </h1>
                    <form action="/Sortie" method="POST" >
                        @csrf
                        <input type="text" name="id" value="{{ $material->id }}" style="display: none">
                        <div class="inputs">
                            <label for="etat" >Date de Sortie : </label>
                    
                        
                            <input type="date" class="Sortie" name="Sortie"  data-material-id="{{ $material->id }}">
                        </div>
                    <button id="sortie" type="submit">Valider</button>
                </form>  


                    <div>
                    <div class="additional-content" data-material-id="{{ $material->id }}">
                    </div>
                    <button class="button close-button" id="Operation" >
                        Close
                    </button>
                </div>
                    </div>  

                </dialog>
              </td>
              @endif
              </tr>
              @endif
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
        height: 250px;
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
    #sortie{
        background-color: #019455;
        color: #fff;   
        font-size: 20px;
        position: absolute;
        bottom: 0px;
        right: 0px;
        width: 50%;
    }
        
    .modal input{
        font-size: 17px;

    }
    
    .modal label{
        font-size: 17px;
    }
    .inputs{
        border: 1px solid #019455;
        background-color: #fff;

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