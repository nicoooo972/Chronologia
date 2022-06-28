<div class="blocconteneur">
<!-- Bloc Titre/Synopsis -->
<?php include("titre.php");?>

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

      include("dbco.php");

      $req = "SELECT * FROM ".$titre." ORDER BY Date";

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


<footer>
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</footer>

  

</body>