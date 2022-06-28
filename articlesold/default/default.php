<!-- Head -->
<!doctype html>

<html lang="fr">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width">

  <title>Chronologia</title>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../../css/style.css">

  <link rel="shortcut icon" href="../imgTest/favicon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>
  <script src="node_modules/@jsplumb/core/js/jsplumb.core.umd.js"></script>
  <script src="node_modules/@jsplumb/browser-ui/js/jsplumb.browser-ui.umd.js"></script>



</head>
<!-- Nav -->
<body>
<?php include("../../nav.php"); ?>
<!-- Bloc Conteneur -->
<div class="blocconteneur">
<!-- Bloc Titre/Synopsis -->

<div class="rowalign">
      <div class=" contenu">
      <div class="dark incontenu">
          <h2>X-men (film) </h2>
          <img src="image/X-Men_films_logo.png" class="d-block w-100">
          <p></p>
        </div></div>
      <div class=" contenu">
      <div class="light incontenu">
          <h2>Sysnopsis</h2>
          <p>X-Men est une série de films américaine, adaptée de la série de comics du même titre créée par Stan Lee et Jack Kirby, et publiée par Marvel Comics.</p>
        </div>
      </div>
    </div>

    <!-- Bloc ChronoBloc -->

  <div class="chronobloc">
    <div class="chronomain"> 
      <!-- Bloc order -->

      <ul id="tri">
        <li><button class="bouton-custom btn"><span>Ordre de Sortie</span></button></li>
        <li><button class="bouton-custom btn"><span>Ordre Chronologique</span></button></li>
      </ul>
      <!-- Bloc Affichage -->

          <?php


      // Affichage sur n colonnes
      // Permet de réaliser l'affichage du résultat
      // d'une requête dans un tableau sur n colonnes

      $db_server = 'stanimqstartos.mysql.db'; // Adresse du serveur MySQL
      $db_name = 'stanimqstartos';            // Nom de la base de données
      $db_user_login = 'stanimqstartos';  // Nom de l'utilisateur
      $db_user_pass = 'Negro123';       // Mot de passe de l'utilisateur

      // Ouvre une connexion au serveur MySQL
      $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);

      $req = "SELECT * FROM Xmen ORDER BY Date";

      //--- Résultat ---//
      $res = mysqli_query($conn,$req);
      //met les données dans un tableau
      while($data = mysqli_fetch_array($res))
      {
      $tablo[]=$data;
      }
      //détermine le nombre de colonnes
      $nbcol=2;
      echo '<div class="container">
      <div class="timeline">
        <ul>';
      echo '<table>';
      $nb=count($tablo);
      for($i=0;$i<$nb;$i++){

      //les valeurs à afficher
      $valeur1=$tablo[$i]['Titre'];
      $valeur2=$tablo[$i]['Date'];

      if($i>=0)
      echo '<li>
        <div class="timeline-content">
        <h3 class="date">'.$valeur2.'</h3>
        <h1>'.$valeur1.'</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur tempora ab laudantium voluptatibus aut eos placeat laborum, quibusdam exercitationem labore.</p>
        </div>
        </li>';


      }
      echo '</table>';
      echo '</ul>
            </div>
            </div>';

      ?>
    </div>
      </div>
      </div>



<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>



  

</body>

</html>