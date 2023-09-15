@extends('sidebar')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <section>


        <div class="table-container">
            <p class="details" style="text-align: center">Details</p>


            <dl class="description-list">
                @if ($user['Details'])
                    <div class="description-pair">
                        <dd style="font-size: 20px"> {{ $user['Details'] }}</dd>
                    </div>
                @else
                    <div class="description-pair">
                        <dt class="t1">id :</dt>
                        <dd>{{ $user->id }}</dd>
                    </div>
                    <div class="description-pair">
                        <dt class="t1">Nom :</dt>
                        <dd>{{ $user->Nom }}</dd>
                    </div>
                    <div class="description-pair">
                        <dt class="t1">Prenom :</dt>
                        <dd>{{ $user->Prenom }}</dd>
                    </div>
                    <div class="description-pair">
                        <dt class="t1">Email :</dt>
                        <dd>{{ $user->email }}</dd>
                    </div>
                    <div class="description-pair">
                        <dt class="t1">Extennsion :</dt>
                        <dd>{{ $user->extension }}</dd>
                    </div>
                    <div class="description-pair">
                        <dt class="t1">Role :</dt>
                        <dd>{{ $user->Role }}</dd>
                    </div>
                    <div class="description-pair">
                        <dt class="t1">Service :</dt>
                        <dd>{{ $user->Service }}</dd>
                    </div>
                    <div class="description-pair">
                        <dt class="t1">Site :</dt>
                        <dd>{{ $user->Site }}</dd>
                    </div>
                    <div class="description-pair">
                        <dt class="t1">Date d'embauche :</dt>
                        <dd>{{ $user->Date_Embauche }}</dd>
                    </div>
                @endif

        </div>
        <section>
        <div class="container">
            <button class="display-button" id="toggleButton">Historisation</button>
        </div>
            
            <div class="table-container2">
                <div>
                    @if ($historiques->isEmpty())
                        <p style="color: red; backgound-color:white; text-align:center; font-weight:300;font-size:25px">Il
                            n'y a aucune historisation pour ce matériel !!</p>
                    @else
                        <table  class="table-auto2">
                            <thead>
                                <tr>
                                    <th class="thh">Utilisateur</th>
                                    <th class="thh">Type d'opération</th>
                                    <th class="thh">Modifications</th>
                                    <th class="thh">Date de Modification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historiques as $historisation)
                                    <tr>
                                        @if ($historisation->FullName == 'Systeme de Connexion' || $historisation->FullName == 'Inconnu')
                                            <td>
                                                Connexion
                                            </td>
                                        @else
                                            <td>
                                                <a style="text-decoration: none;"
                                                    href="{{ route('showUser', ['id' => $historisation->user_id]) }}">{{ $historisation->FullName }}
                                                </a>
                                            </td>
                                        @endif
                                        <td>{{ $historisation->operation }}</td>
                                        <td>{{ $historisation->changes }}</td>
                                        <td>{{ $historisation->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>

            </div>
            <div class="table-container3">
                <div>
                    @if ($materials->isEmpty())
                        <p style="color: red; backgound-color:white; text-align:center; font-weight:300;font-size:25px">
                            L'utilisateur n'a encore aucun Materiel !!</p>
                    @else
                        <table class="table-auto2" >
                            <thead>
                                <tr>
                                    <th class="thh">Produit</th>
                                    <th class="thh">Marque</th>
                                    <th class="thh">Date d'achat</th>
                                    <th class="thh">Fournisseur</th>
                                    <th class="thh">Numero de Facture</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materials as $material)
                                    <tr>

                                        <td>
                                            <a style="text-decoration: none;"
                                                href="{{ route('showMaterial', ['id' => $material->id]) }}">{{ $material->TypeProduit }}
                                            </a>
                                        </td>
                                        <td>{{ $material->Marque }}</td>
                                        <td>{{ \Carbon\Carbon::parse($material->DateAchat)->format('Y-m-d') }}</td>
                                        <td>{{ $material->Fournisseur }}</td>
                                        <td>{{ $material->N_Facture }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>

            </div>
        </div>
    </section>
    </section>
@endsection

<script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById("toggleButton");
            const historisationTable = document.querySelector(".table-container2");
            const materialsTable = document.querySelector(".table-container3");

            toggleButton.addEventListener("click", function() {
                if (toggleButton.textContent === "Historisation") {
                    toggleButton.textContent = "Materials";
                    historisationTable.style.display = "none";
                    materialsTable.style.display = "flex";
                } else {
                    toggleButton.textContent = "Historisation";
                    historisationTable.style.display = "flex";
                    materialsTable.style.display = "none";
                }
            });
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<style>
    .description-list {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        margin-top: 20px;
        margin-bottom: 20px;
        justify-content: center;
    }

    .description-pair {
        display: flex;
        align-items: center;
    }

    th {
        position: sticky;
        top: 0;
        background-color: #019455;
        color: #fff;
        font-weight: 500;
        height: 50px;
    }
    .display-button{
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        background-color: #019455;
        padding: 5px;
        border-radius: 5px;
    }
    .t1 {
        background-color: rgb(242, 242, 242);
        color: green;
        font-weight: bold;
        flex-shrink: 0;

    }

    .description-pair dd {
        margin: 0;
        padding-left: 10px;

    }

    .expired {
        color: red;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow-y: auto;
    }

    .table-container {
       
        min-width: 40%;
        max-width: 80%;
        margin-left: 12%;
        margin-top: 40px;
    }

    .table-container2 {
        
        width: 80%;
        margin: auto;
        margin-top: 40px;
        display: none;
        justify-content: center;
    }

    .table-container3 {
        background-color: whitesmoke;
        width: 50%;
        margin: auto;
        margin-top: 40px;
        display: none;
        justify-content: center;
    }
    /*.table-container3 > div {
    max-width: 80%;
    width: 100%;
    }
    .table-container3 < div {
    max-width: 40%;
    width: 100%;
    }
    /*
    .table-container2 < div {
   
     max-width: 65%;
    width: 100%;
    }
    .table-container2 > div {
    max-width: 75%;
    width: 100%;
    }*/
    .table-auto2 {
        background-color: whitesmoke;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
        display: block;
        text-align: center;
        overflow: scroll;
        cursor: pointer;
        border: 1px solid black
    }

    th {
        position: sticky;
        top: 0;
        background-color: #019455;
        color: #fff;
        font-weight: 500;
        height: 50px;
        padding: 5px;
    }

    .table-auto {

        background-color: whitesmoke;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
        display: block;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .t1 {
        background-color: rgb(242, 242, 242);
        color: green;
        font-weight: bold;
    }

    .details {
        background-color: #019455;
        color: white;
        font-weight: 400;
        font-size: 18px;
    }

    .add-button {
        height: 10%;
        border-bottom: 2px double black
    }

    .tooltip-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .tooltip-content {
        display: none;
        position: absolute;
        width: 180px;
        top: calc(100% + 5px);
        left: 0;
        background-color: #564a4acb;
        color: white;
        border: 3px double #019455;
        border-radius: 10px;
        padding: 5px;
        z-index: 1;
    }

    .tooltip-container:hover .tooltip-content {
        display: block;
    }
</style>
