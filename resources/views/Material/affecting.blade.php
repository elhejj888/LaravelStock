@extends('sidebar')
@section('content')
<section class="home">

    <div class="container">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <div class="search">
            <input type="search" name="search" id="search" class="form-control" placeholder="rechercher Utilisateur" data-id="{{ $id }}" style="width:100%;padding : 5px; margin-bottom:10px;">
        </div>
          <div>
            <table class="table-auto" border="1px solid black ; ">
                <thead>
                    <tr>
                      <th class="thh">Nom</th>
                      <th class="thh">Prenom</th>
                      <th class="thh">Service</th>
                      <th class="thh">Site</th>
                      <th class="thh">Action</th>
                    </tr>
                </thead>
                <tbody id="Content" class="mainData">
                </tbody>
            </table>
          </div>
    </div>
</section>
<script type="text/javascript">
    $('#search').on('keyup',function(){
      $value = $(this).val();
      $id = $(this).data('id'); // Retrieve the id value
      if($value){
        $('.mainData').show();
      }
      else{
        $('.mainData').hide();
      }
      $.ajax({
        type:'get',
        url:'{{URL::to('assign')}}',
        data: {
            'search': $value,
            'id': $id // Pass the id value
        },
        success:function(data){
          console.log(data);
          $('#Content').html(data);
        }
      });
    }
    )
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
        .container {
            height: 700px;
            width: 40%;
            /* Adjust the height as needed */
            overflow-y: auto;
            /* Add scroll if content exceeds container height */
        }
        th{
          background-color: rgb(184, 184, 184);
            color:green;
            width: 120px;
        }
        .add-button{
            height: 10%;
            border-bottom: 2px double black
        }
       
    </style>
    
    @endsection