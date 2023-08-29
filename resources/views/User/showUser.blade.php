@extends('sidebar')
@section('content')
<section >


        <div class="table-container">
          <p class="details" style="text-align: center">Details</p>
          <dl class="description-list">
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
      
    </div>

<div class="table-container">
            <div>
              @if ($historiques->isEmpty())
        <p style="color: red; backgound-color:white; text-align:center; font-weight:300;font-size:25px" >Il n'y a aucune historisation pour ce matériel !!</p>
              @else
                <table class="table-auto2" style="border: 1px solid black">
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
                            @if($historisation->FullName == "Systeme de Connexion" || $historisation->FullName == "Inconnu")
                            <td>
                                Connexion
                            </td>
                            @else
                            <td>
                                <a
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
    </section>
@endsection
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
        background-color: whitesmoke;
        width: 80%;
        margin-left: 12%;
        margin-top: 40px;
    }

    .table-auto2 {
        border: 1px solid black;
        background-color: whitesmoke;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
        display: block;
        text-align: center;

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
