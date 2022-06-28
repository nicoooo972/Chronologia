<?php
try
{
 $bdd = new PDO("mysql:host=stanimqstartos;dbname=stanimqstartos", "stanimqstartos.mysql.db", "Nicolas123");
 $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  die("Une érreur a été trouvé : " . $e->getMessage());
}
$bdd->query("SET NAMES UTF8");
?>

<form action = "verif-form.php" method = "get">
   <input type = "search" name = "terme">
   <input type = "submit" name = "s" value = "Rechercher">
  </form>
