<?php
include "db.php";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['forminscription'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);    $mdp2 = sha1($_POST['mdp2']);
    if (!empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['mdp']) and !empty($_POST['mdp2'])) {
        $pseudolength = strlen($pseudo);        //pseudo inf à 255 caractère        
        if ($pseudolength <= 255) {            //verification que le mail correspond             
        if ($mail == $mail2) {                
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {                    //verification que le mail n'existe pas déjà dans la bdd                    
            $reqmail = $conn->prepare("SELECT * FROM Membres WHERE mail = ?");                    
            $reqmail->execute(array($mail));                    
            $mailexist = $reqmail->rowCount();                    
            if ($mailexist == 0) {                        
                //verification que le mdp correspond                        
            if ($mdp == $mdp2) {                                
                $longueurKey = 15;                            
                $key = "";                            
                for($i=1;$i<$longueurKey;$i++) {                                
                    $key .= mt_rand(0,9);                             }                            
                    //req sql pour ajouter les informations rentrées dans la bdd                             
                    $insertmbr = $conn->prepare("INSERT INTO Membres(pseudo, mail, motdepasse,confirmekey) VALUES (?,?,?,?)");                           
                    $insertmbr->execute(array($pseudo, $mail, $mdp,$key));                             
                    /*                            
                    $header="MIME-Version: 1.0\r\n";                            
                    $header.='From:"[VOUS]"<votremail@mail.com>'."\n";                            
                    $header.='Content-Type:text/html; charset="uft-8"'."\n";                            
                    $header.='Content-Transfer-Encoding: 8bit';                            
                    $message='                            
                    <html>                               
                    <body>                                  
                    <div align="center">                                        
                    <a href="http://stanime.fr/confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">Confirmez votre compte</a>                                  
                    </div>                               
                    </body>                            
                    </html>                            
                    ';                            
                    mail($mail, "Confirmation de compte", $message, $header);*/                            
                    $_SESSION['comptecree'] = "Votre compte a bien été crée !";                            
                    header('Location : index.php');                        
                    } else {                            
                        $erreur = "Vos mot de passe ne correspondent pas !";                        
                    }                    
                    }else {                        
                        $erreur = "Adresse mail déjà utilisée !";                    
                    }                
                    } else {                    
                        $erreur = "Votre adresse mail n'est pas valide !";                
                    }            
                        } else {                
                        $erreur = "Vos adresse mail ne correspondent pas !";            
                        }        
                        } else {            
                        $erreur = "Votre pseudo ne doit pas dépasser 255 caratères !";        
                        }    
                    } else {        
                        $erreur = "Tous les champs doivent être complétés !";    }
                    }
?>

                        
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
    <meta charset="utf-8">
</head>
<body class="body-inscription">

<h2 style="text-align:center;background-color:#1C2833;color:white;padding:1%;">Inscription</h2>
<div class="container-inscription">

    <div class="form-inscr">
    <form action="" method="POST">

        <h4 style="color: #B0D7FF;">Pseudo :</h4>
        <input type="text" placeholder="Votre pseudo" name="pseudo" class="input-pseudo" required>

        <h4 style="color: #B0D7FF;">Adresse E-mail :</h4>
        <input type="text" placeholder="Votre e-mail" name="mail" class="input-mail-inscr" required>

        <h4 style="color: #B0D7FF;">Confirmation du e-mail :</h4>
        <input type="text" placeholder="Confirmez votre e-mail" name="mail2" class="input-confirmail" required>

        <h4 style="color: #B0D7FF;">Mot de passe :</h4>
        <input type="password" placeholder="Votre mot de passe" name="mdp" class="input-mdp" required>

        <h4 style="color: #B0D7FF;">Confirmation du mot de passe :</h4>
        <input type="password" placeholder="Confirmez votre mot de passe" name="mdp2" class="input-mdp2" required>

        <br><br>

        <input type="submit" name="forminscription" class="submit-inscription" value="Valider">

    </form>

        <br><br>

        <?php if (isset($erreur)) { echo '<font color="red">' . $erreur . "<font/>"; } ?>

        <br><br>
        <h5 class="already-signin">Déjà inscrit ? <a href="./connexion.php" style="text-decoration:none; color:#B0D7FF;"><strong><i>Connectez-vous !</i></strong></a></h5>
        <br>
        <a href="https://stanime.fr/" style="text-decoration:none; color:#B0D7FF;font-size: 0.83em;"><strong><i>Retourner à l'accueil</i></strong></a>
    </div>

</div>

</body>
</html>