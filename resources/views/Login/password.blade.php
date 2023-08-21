<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Wavy login form</title>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('../../css/styleLogin.css')}}">

</head>
<body>
<div class="center-img">
  <img class="main-logo" src="{{asset('../img/logo1.png')}}" alt="">
</div>
<!-- partial:index.partial.html -->
<form class="login" action="/connection" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="email" placeholder="Adresse electronique" id="email" value="{{$user->email}} " disabled>
  <input name="Email" type="hidden" value="{{$user->email}} ">
  <input name="Ftime" type="hidden" value="{{$Ftime}} ">


  <div id="pass-wrap">
  <input name="password" type="password" placeholder="Mot de passe" id="pass" required>
  </div>
  <button type="submit" id="login-button">S'authentifier</button>

      
</form>

<script src="{{asset('../../js/indexLogin.js')}}"></script>

  
</body>
</html>
