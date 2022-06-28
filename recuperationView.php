<!DOCTYPE html>
<html lang="fr">

<head>

    <title>Récupération de votre mot de passe sur Stanime.fr</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



</head>

<body>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="index.php" class="navbar-brand">Chrono<b>logia</b></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-item nav-link">Accueil</a>
                </div>

            </div>
        </nav>

        <!--<h4 class="title-element">Récupération de mot de passe</h4>-->

        <div class="container-recup-mdp">

            <div class="form-recup-mdp">
                <?php if ($section == "code") { ?>
                    <text style="color: white;">Un code de vérification vous a été envoyé par mail:</text> <?= $_SESSION['recup_mail'] ?>
                    <br />
                    <form method="post">
                        <input style="margin-bottom: 2%;" type="text" placeholder="Code de vérification" name="verif_code" class="input-verif-code" /><br />
                        <input style="margin-bottom: 2%;" type="submit" value="Valider" name="verif_submit" class="input-verif" />
                    </form>
                <?php } elseif ($section == "changemdp") { ?>
                    <text style="color: white;margin-bottom: 2%;">Nouveau mot de passe pour</text> <?= $_SESSION['recup_mail'] ?>
                    <form method="post">
                        <input style="margin-bottom: 2%;" type="password" placeholder="Nouveau mot de passe" name="change_mdp" class="input-recup-changemdp" /><br />
                        <input style="margin-bottom: 2%;" type="password" placeholder="Confirmation du mot de passe" name="change_mdpc" class="input-recup-confirmdp" /><br />
                        <input style="margin-bottom: 2%;" type="submit" value="Valider" name="change_submit" class="input-recup-change" />
                    </form>
                <?php } else { ?>
                    <form action="" method="post">

                        <h4 style="color: #B0D7FF;">Adresse E-mail :</h4>
                        <input style="margin-bottom: 2%;" type="email" placeholder="Votre adresse mail" name="recup_mail" class="input-recup-mail" /><br />
                        <input style="margin-bottom: 2%;" type="submit" value="Valider" name="recup_submit" class="input-recup-submit" />
                    </form>
                <?php } ?>
                <?php if (isset($error)) {
                    echo '<span style="color:red">' . $error . '</span>';
                } else {
                    echo "";
                } ?>
            </div>

        </div>

   
<?php
    include("footer.php");
?>

</body>

</html>