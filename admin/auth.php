<!-- page pour auth l'admin -->

<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="./css/auth_style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div class="center">
            <div class="container">
                <!-- zone de connexion -->
                <h1>Connexion</h1>
                <form action="authConfig.php" method="post">
                    
                    <label>Nom d'utilisateur</label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="adminName" class="formulaire" required>

                    <label>Mot de passe</label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" class="formulaire" required>

                    <input type="submit" id='submit' value='LOGIN' >
                </form>
            </div>
        </div>
    </body>
</html>