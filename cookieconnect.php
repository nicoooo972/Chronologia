<?php
include "db.php";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(!isset($_SESSION['id']) AND isset($_COOKIE['email'],$_COOKIE['password']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password'])) {
   $requser = $conn->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
   $requser->execute(array($_COOKIE['email'], $_COOKIE['password']));
   $userexist = $requser->rowCount();
   if($userexist == 1)
   {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['mail'] = $userinfo['mail'];
   }
}
?>