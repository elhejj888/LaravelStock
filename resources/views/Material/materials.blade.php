@extends('sidebar')
@section('content')
    <section class="home">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <div class="container">
            <div>
                <div class="add-button">
                    <a href="addmaterial" class="add-user">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="auto" fill="#019455"
                            class="bi bi-send-plus" viewBox="0 0 16 16">
                            <path
                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z" />
                            <path
                                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="search">
                <p style="text-align: center;color:red;font-size:20px;font-weight:bold;">
                    @if (session('message'))
                        {{ session('message') }}
                    @else
                        {{ $message }}
                    @endif

                </p>
                <input type="search" name="search" id="search" class="form-control" placeholder="rechercher Materiels"
                    style="width:100%;padding : 5px; margin-bottom:10px;">
            </div>

            <table class="table-auto" border="1px solid black">
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
                        @if (Auth::user()->Role === 'Admin')
                            <th class="thh">Supprimer</th>
                        @endif
                        <th class="thh">Affecter</th>
                        <th class="thh">Detailles</th>
                        <th class="thh">Gerer</th>


                    </tr>
                </thead>
                <tbody id="Content" class="searchData"></tbody>
                <tbody class="mainData">
                    @foreach ($materials as $material)
                        @if ($material->etat != 'rupture')
                            <tr>

                                <td>{{ $material->TypeProduit }}</td>
                                <td>{{ $material->Marque }}</td>
                                <td>{{ $material->Tag }}</td>
                                <td>{{ $material->etat }}</td>
                                <td>{{ \Carbon\Carbon::parse($material->DateAchat)->format('Y-m-d') }}</td>
                                <td>{{ $material->Emplacement }}</td>
                                <td>{{ $material->Site }}</td>
                                <td class="op">
                                    <button class="operation"
                                        onclick="window.location.href = '{{ route('updateMaterial', ['id' => $material->id]) }}';"
                                        style="text-decoration: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#101357"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                        Modifier
                                    </button>
                                </td>

                                @if (Auth::user()->Role === 'Admin')
                                    <td class="op">
                                        <button class="operation"
                                            onclick="if (confirm('Êtes-vous sûr de supprimer ..?')) window.location.href = this.getAttribute('data-href');"
                                            data-href="{{ route('deleteMaterial', ['id' => $material->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto"
                                                fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                            Supprimer
                                        </button>
                                    </td>
                                @endif

                                <td class="op">
                                    <button class="operation"
                                        onclick="{{ $material->etat === 'Disponible' ? "window.location.href = '" . route('affectMaterial', ['id' => $material->id]) . "';" : 'return false;' }}"
                                        {{ $material->etat !== 'Disponible' ? 'disabled style=background-color:grey; color:white;' : '' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="#101357"
                                            class="bi bi-send-plus" viewBox="0 0 16 16">
                                            <path
                                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z" />
                                            <path
                                                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                                        </svg>
                                        Affecter
                                    </button>
                                    <dialog class="modal" id="modal-{{ $material->id }}" style="margin:auto; align-content:center;">
                                        <h1>Etat de Stock </h1>
                                        <table>
                                            <td>
                                                <label for="etat" style="color: black">Etat : </label>
                                        
                                            </td>
                                            <td>
                                                <select class="etat-select" data-material-id="{{ $material->id }}" name="etat2" id="">
                                                    <option value="{{ $material->etat }}" style="display: none;">{{ $material->etat }}</option>
                                                    @if ($material->etat == "Assigne")
                                                        
                                                    <option value="Disponible">Disponible</option>
                                                    <option value="Maintenance">Maintenance</option>

                                                    @elseif ($material->etat =="Disponible")

                                                    <option value="Maintenance">Maintenance</option>
                                                    <option value="Assigne">Assigne</option>

                                                    @else

                                                    <option value="Assigne">Assigne</option>
                                                    <option value="Disponible">Disponible</option>
                                                    @endif
                                                    

                                                </select>
                                            </td>
                                        </table>
                                        <div>
                                        <div class="additional-content" data-material-id="{{ $material->id }}">
                                        </div>
                                        <button class="button close-button" id="Operation" style="width:80px;">
                                            Close
                                        </button>
                                    </div>
                                        
                                    </dialog>
                                </td>
                                

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
                                <td class="op">
                                    <button id="open-button" class="operation" data-modal="modal-{{ $material->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="auto" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                          </svg>
                                        Gerer
                                    </button>
                                </td>

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
        document.querySelectorAll('#open-button').forEach(button => {
            const modalId = button.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
    
            button.addEventListener('click', () => {
                modal.showModal();
            });
    
            modal.querySelector('.close-button').addEventListener('click', () => {
                modal.close();
            });
    
            // Handle change in select
            const etatSelect = modal.querySelector('.etat-select');
            const additionalContent = modal.querySelector('.additional-content');
    
            etatSelect.addEventListener('change', () => {
                const selectedValue = etatSelect.value;
                console.log(etatSelect.value)
                const materialId = etatSelect.getAttribute('data-material-id');
                console.log(materialId)
                // Update additional content based on selected value
                if (selectedValue === 'Maintenance') {
                    additionalContent.innerHTML = `
                        <form action="/fix" method="POST">
                            @csrf
                            <input type="text" value="maintenance" name="etat" style="display:none;">
                            <input type="text" value=`+materialId+` name="id" style="display:none;">
                            <label for="description">Description: </label>
                            <textarea name="description" id="description" cols="30" rows="4" required></textarea>                            </tr>
                            <button class="operation" style="width:80px;" type="submit">Submit</button>
                        </form>
                    `;
                } else if (selectedValue === 'Assigne') {
                    additionalContent.innerHTML = `
                        <a href="{{ route('affectMaterial', ['id' => ':materialId']) }}"
                            class="operation">Affecter</a>
                    `.replace(':materialId', materialId);
                } else if (selectedValue === 'Disponible') {
                    additionalContent.innerHTML = `
                    <form action="/matt" method="POST">
                        @csrf
                    <input type="text" value="Disponible" name="etat" style="display:none;">
                    <input type="text" value=`+materialId+` name="id" style="display:none;">
                        <select name="emplacement">
                            <option value="2eme etage">2eme etage</option>
                            <option value="5eme etage">5eme etage</option>
                            <option value="7eme etage">7eme etage</option>
                        </select>
                        <select name="site">
                            <option value="Casablanca">Casablanca</option>
                            <option value="Oujda">Oujda</option>
                        </select>
                        <button class="operation" style="width:80px;" type="submit">Submit</button>
                    `;
                } else {
                    additionalContent.innerHTML = ''; // Clear additional content
                }
                
            });
        });
    </script>
    <script>
        document.querySelectorAll('.open-button').forEach(button => {
            const modalId = button.getAttribute('data-modal');
            const modal = document.getElementById(modalId);

            button.addEventListener('click', () => {
                modal.showModal();
            });

            modal.querySelector('.close-button').addEventListener('click', () => {
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
                url: '{{ URL::to('searchMaterial') }}',
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
        .modal{
            color: #019455;
            background-color: whitesmoke;
            border-radius: 15px;
            padding: 1em;
            width:400px;
        }

        .modal::backdrop{
            background-color: #0194545f;
        }
        #Operation {
            color: white;
            background-color: #019455;
            font-weight: bold;
            padding: 2px;
            margin: 2px;
            border-radius: 3px;

        }

    </style>
@endsection
