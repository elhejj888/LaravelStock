    <!-- Coding by CodingLab | www.codinglabweb.com -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('../img/logo1.png')}}" />
    <script src="{{asset('../js/script.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="{{asset('../css/style.css')}}">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Stock Manager</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                   <a href="/home"> <img src="{{asset('../../img/logo1.png')}}" alt=""></a>
                </span>

                <div class="text logo-text">
                    <span class="name">ECA Assurance</span>
                    <span class="profession">Stock Manager</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="nav-link">
                    <a href="/home">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" id="icon2"  class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                              </svg>
                        </div>
                        <span class="text nav-text">&nbsp; Acceuil</span>
                    </a>
                </li>

                <ul class="menu-links">
                    <li class="search-box">
                        <a href="/users">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  id="icon2" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                  </svg>  
                            </div>                 
                        <span class="text nav-text">&nbsp; Utilisateurs</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/materials">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  id="icon2" class="bi bi-boxes"  viewBox="0 0 16 16">
                                    <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                                  </svg>        
                                  </div> 
                            <span class="text nav-text">&nbsp; Materiels</span>
                        </a>
                        
                    </li>

                    

                    <li class="nav-link">
                        <a href="/historisation">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  id="icon2" class="bi bi-clock-history" viewBox="0 0 16 16">
                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                  </svg>
                            </div>
                            <span class="text nav-text">&nbsp; Historique</span>
                        </a>
                    </li>
                    @if(Auth::user()->Role === 'Admin')
                    <li class="nav-link">
                        <a href="/maintainMaterials">
                            <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  id="icon2" class="bi bi-wrench-adjustable-circle" viewBox="0 0 16 16">
                                <path d="M12.496 8a4.491 4.491 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11c.027.2.04.403.04.61Z"/>
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-1 0a7 7 0 1 0-13.202 3.249l1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.49 4.49 0 0 1-1.592-.29L4.747 14.2A7 7 0 0 0 15 8Zm-8.295.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27.596-.894Z"/>
                              </svg>
                            </div>
                            <span class="text nav-text">&nbsp; Reparation</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/trashCan">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" id="icon2" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                  </svg>
                            </div>                            
                            <span class="text nav-text">&nbsp; Mise en rebut</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/ManageDrops">
                            <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" id="icon2" class="bi bi-tools" viewBox="0 0 16 16">
                                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                                  </svg>
                            </div>                            
                            <span class="text nav-text">&nbsp; Administration</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#" id="logout-link">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                
                    <script>
                        document.getElementById('logout-link').addEventListener('click', function(event) {
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        });
                    </script>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>
<body>
    <div class="home">
            <div>
                <div class="add-button">
                    <button class="add-mat" onclick="window.location.href = 'addmaterial';">
                        Ajouter Materiel
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#fff" class="bi bi-send-plus" viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z" />
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                    </button>                    
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
            <div  id="example_wrapper" class="dataTables_wrapper dt-bootstrap4" >
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
                    <th class="no-export">Detailles</th>
                    @if(Auth::user()->Role === 'Admin')
                    <th class="no-export">Mise en Sortie</th>
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
                        <td class="no-export">
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
                  <td class="no-export">
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
</div>
</body>
<script>
    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('#example')) {
            $('#example').DataTable().destroy();
        }
    
        // Initialise la table DataTable
        var table = $('#example').DataTable({
            paging: true,
            pageLength: 15, // 10 éléments par page par défaut
            searching: true, // Afficher la barre de recherche
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(.no-export)'
                    }
                }
            ]
        });
    
        // Fonction pour afficher un message lorsque la table est vide
        function showNoDataMessage() {
            $('#example tbody').html('<tr><td colspan="8"><center> Pas d\'élément pour l\'instant</center></td></tr>');
        }
    
        // Vérifie si la table est vide après chaque dessin
        table.on('draw', function() {
            if (table.rows().count() === 0) {
                showNoDataMessage();
            }
        });
    
        // Vérifie également si la table est vide lors de l'initialisation
        if (table.rows().count() === 0) {
            showNoDataMessage();
        }
    });
</script>
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
/* Apply a transition to the scale and opacity properties of .box and .lab when hovered */


.green-text {
    color: green !important; /* Change la couleur du texte en vert */
}

/* Style pour centrer le texte dans la barre de recherche */
.dataTables_filter input[type="search"] {
    text-align: center;
}



.hovered {
transform: scale(1.2);
opacity: 0.9;
transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
}

.home{
    width: 80%;
    height: 300px;
    overflow-y: auto;
}
.home input{
    background-color: #fff;
    margin-bottom: 10px;
}

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
    .dataTables_filter {
            text-align: center; /* Aligner la barre de recherche à droite */
    }
        .dataTables_filter input[type="search"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }
    /* Masquer le texte "Show X entries" */
    .dataTables_length {
        display: none;
    }
    .dataTables_info {
            display: none;
     }
     .dataTables_paginate {
            text-align: center;
            padding: 10px;
        }
        
        .dataTables_paginate a {
            padding: 5px 10px;
            margin: 0 5px;
            border: 1px solid blue;
            border-radius: 5px;
            text-decoration: none;
            color: blue;
            background-color: blue;
        }

        .dataTables_paginate a:hover {
            background-color: blue;
        }

        .dataTables_paginate .active a {
            background-color: #007bff;
            color: blue;
            border: 1px solid #007bff;
        }   
    </style>
</html>

    
        
    

    


