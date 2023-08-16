@extends('sidebar')
@section('content')
<section class="home">

    <div class="container">
        <table class="table-auto" border="1px solid black" >
            <thead>
              <tr>
                <th>Utilisateurs Supprimés</th>
                <th>Materiels Supprimés</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="deleted">
                    <a href="/deletedusers"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="auto" fill="#019455" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                  </svg></a>
                </td>
                
                <td class="deleted">
                    <a href="/deletedmaterials"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="auto" fill="#019455" class="bi bi-archive-fill" viewBox="0 0 16 16">
                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                  </svg></a>
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
  width: 100%;
  
}
    th{
      background-color: rgb(184, 184, 184);
        color:green;
    }
    .deleted{
        text-align: center;
    }
    .add-button{
        height: 10%;
        border-bottom: 2px double black
    }
   
</style>

@endsection