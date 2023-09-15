@extends('sidebar')
@section('content')
<section class="home">

    <div class="container">
        <table class="table-auto" border="1px solid black" >
            <thead>
              <tr>
                <th>
                    <h1 style="font-size: 28px">Conditions d'utilisation</h1></th>
                
              </tr>
            </thead>
            <tbody >
              <tr>
                <td class="conditions">
                    <p>
Lorsque vous ajoutez de nouveaux éléments tels que des sites, des marques, des emplacements de stock ou des services, assurez-vous de respecter ces règles : <br>
<br>    
<span style="font-weight: bold; color:red; ">1. Lors de l'ajout d'un nouveau site, il est obligatoire de spécifier les emplacements de stock si vous gérez du matériel, ou les services si vous gérez des utilisateurs. <br> <br>

2. Lors de l'ajout de nouveaux types de matériels, n'oubliez pas d'associer les marques correspondantes.<br>
<br>
3. Chaque type de matériel peut avoir des options, mais leur absence n'est pas un problème.<br> <br>
</span>
De plus, soyez conscient que si vous supprimez un type de matériel, toutes les marques et options liées seront également supprimées. De même, la suppression d'un site entraînera la suppression de tous les emplacements de stock et services associés à ce site. Ces règles sont conçues pour maintenir la cohérence et l'intégrité de vos données dans l'application de gestion de stock.
                    </p>
                    <button class="btn" id="delete" onclick="window.location.href = 'DeleteDrops';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="auto" fill="#019455" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                          </svg>
                          Supprimer Valeurs
                    </button>
                    <button id="add" class="btn" onclick="window.location.href = 'ManageDrops';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="auto" fill="#019455" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                          </svg>
                          Ajouter Valeurs
                    </button>
                </td>
                
                
                
              </tr>
              
            </tbody>
            
          </table>
          
      
    </div>
<style>

.table-auto{
  background-color: whitesmoke;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
  display: block;
  width: 70%;
  margin: auto;

  
}
    th{
      background-color:#019455;
        color:#fff;
    }
    .conditions{
        text-align:justify;
        text-align:center;

        
    }

   .btn{
    background-color: #fff;
    padding: 5px;
    border: 2px solid #019455;
    border-radius: 8px; 
    color: #019455;
    font-size: 20px;
    font-weight: 600;  
    text-align: center; 
    margin: auto;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.7);
    
   }
   #delete{
    color: red;
    border: red 2px solid;
    left: 0;
    width: 40%;
    margin: 20px;
   }
   #delete svg{
    fill: red;

   }

   #delete:hover{
    background-color: red;
    color:#fff;
    fill: #fff;
   }
   #delete:hover svg{
    fill: #fff;
   }
   #add{
    right: 0;
    width: 40%;
    margin: 20px;
   }
   #add:hover{
    background-color: #019455;
    color:#fff;
   }
   #add:hover svg{
    fill: #fff;
   }
</style>

@endsection