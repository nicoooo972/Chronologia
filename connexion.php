<!DOCTYPE html>
<html lang="fr">
<head>

<link rel="stylesheet" href="css/style.css">

<title>Connexion sur Chronologia</title>

<meta charset="utf-8">

</head>


<body class="body-connexion">

    <h2 style="text-align:center;background-color:#1C2833;color:white;padding:1%;">Connexion</h2>
    <div class="container-connexion">

        <div class="form-conn">
            <form action="verif.php" method="POST">

                <h4 style="color: #B0D7FF;">Adresse E-mail :</h4>
                <input type="text" name="mailconnect" class="input-email" placeholder="Votre e-mail" required />

                <h4 style="color: #B0D7FF;">Mot de passe :</h4>
                <input type="password" name="mdpconnect" class="input-mdp" placeholder="Votre mot de passe" required />

                <br><br>

                <input type="checkbox" name="remember" id="remembercheckbox"><label for="remembercheckbox" class="remind-me">Se souvenir de moi</label>

                <a href="recuperation.php" class="forget-mdp">Mot de passe oublié</a>

                <br><br>

                <input type="submit" name="formconnexion" class="submit-connexion" value="Se connecter" />

            </form>

            <?php if (isset($erreur)) {
                echo '<font color="red">' . $erreur . "<font/>";
            } ?>

            <br><br>
            <h5 class="no-signup">Vous n'êtes pas inscrit ? <a href="./inscription.php" style="text-decoration:none; color:#B0D7FF;"><strong><i>Inscrivez-vous !</i></strong></a></h5>
            <br>
            <a href="https://stanime.fr/" style="text-decoration:none; color:#B0D7FF;font-size: 0.83em;"><strong><i>Retourner à l'accueil</i></strong></a>
        </div>

    </div>

</body>

</html>