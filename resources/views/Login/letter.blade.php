<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lettre avec Mot de Passe</title>
    <style>
        body {
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 18px;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #019455;
            text-align: center;
        }

        p {
            color: #333;
        }

        .password {
            background-color: #019455;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Application ECA Assurance Gestion de Stock</h1>
        <p>Bienvenue dans l'application de gestion de stock ECA Assurance.</p>
        <p>Votre mot de passe de connexion est : <span class="password">{{$data}}</span></p>
        <p>Assurez-vous de ne pas partager ce mot de passe avec d'autres personnes.</p>
        <p>Vous pouvez maintenant utiliser ce mot de passe pour vous connecter à l'application.</p>
        <p>Merci de faire partie de notre équipe de gestion de stock.</p>
    </div>
</body>
</html>
