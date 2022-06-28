<?php
session_start();
require "db.php";

if(!empty($_POST['mailconnect']) && !empty($_POST['mdpconnect'])) // Si il existe les champs email, password et qu'il sont pas vides
{
    // Patch XSS
    $email = htmlspecialchars($_POST['mailconnect']); 
    $password = htmlspecialchars($_POST['mdpconnect']);
    
    $email = strtolower($email); // email transformé en minuscule
    
    // Check si l'utilisateur est inscrit dans la table utilisateurs   Pdo > à msqli btw mais on va rester sur mysqli pour le moment ^^
        $requete = "SELECT count(*) FROM Membres WHERE 
              mail = '".$email."' and motdepasse = '".$password."' ";
        $exec_requete = mysqli_query($conn,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $email;
           header('Location: index.php');
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
}
else
{
   header('Location: login.php');
}
mysqli_close($conn); // fermer la connexion
?>

<body>dezvgfzds</body>