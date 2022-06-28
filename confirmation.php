<?php
include "db.php";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
if(isset($_GET['pseudo'], $_GET['key']) AND !empty($_GET['pseudo']) AND !empty($_GET['key'])) {
   $pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
   $key = htmlspecialchars($_GET['key']);
   $requser = $conn->prepare("SELECT * FROM Membres WHERE pseudo = ? AND confirmkey = ?");
   $requser->execute(array($pseudo, $key));
   $userexist = $requser->rowCount();
   if($userexist == 1) {
      $user = $requser->fetch();
      if($user['confirme'] == 0) {
         $updateuser = $conn->prepare("UPDATE Membres SET confirme = 1 WHERE pseudo = ? AND confirmkey = ?");
         $updateuser->execute(array($pseudo,$key));
         echo "Votre compte a bien été confirmé !";
      } else {
         echo "Votre compte a déjà été confirmé !";
      }
   } else {
      echo "L'utilisateur n'existe pas !";
   }
}
?>