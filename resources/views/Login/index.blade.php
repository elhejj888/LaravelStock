<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Wavy login form</title>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><link rel="stylesheet" href="./style.css">

</head>
<body>
<div class="center-img">
  <img class="main-logo" src="../logo1.png" alt="">
</div>
<!-- partial:index.partial.html -->
<form class="login">
  <input type="email" placeholder="Adresse electronique" id="email" required>
  <div id="pass-wrap" style="display: none;">
  <input type="password" placeholder="Mot de passe" id="pass" required>
  </div>
  <button id="login-button">S'authentifier</button>
</form>
<script src="./index.js"></script>
<script>
  document.getElementById('login-button').addEventListener('click', function() {
    // Show the password input when the login button is clicked
    const emailInput = document.getElementById('email');
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (emailInput.value=='') {
      showCustomAlert('entrer votre Adresse electronique !!');
    }
    else if(!email.value.match(mailformat)){
      showCustomAlert('veuillez entrer un email valide !!');
    }
    else {
      document.getElementById('pass-wrap').style.display = 'block';
    }
  });
        

</script>
  
</body>
</html>
