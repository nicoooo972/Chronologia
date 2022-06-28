<?php
  session_start();
  $bdd = new PDO("mysql:host=stanimqstartos;dbname=stanimqstartos", "stanimqstartos.mysql.db", "Nicolas123"); 
  if(isset($_GET['user'])){
    $user = (String) trim($_GET['user']);
 
    $req = $DB->query("SELECT *
      FROM articles
      WHERE titre LIKE ?
      LIMIT 10",
      array("$user%"));
 
    $req = $req->fetchALL();
  
    foreach($req as $r){
      ?>   
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['titre'] ?></div><?php    
    }
  } 
?>