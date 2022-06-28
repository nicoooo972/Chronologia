<!doctype html>

<html lang="fr">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width">

  <title>Chronologia</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="../imgTest/favicon.png">



  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>      <!-- /!\ -->



</head>

<body>

<?php include("nav.php"); ?>
  
<?php 

// Paramétres BDD
include "db.php";


// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupération de tous les Articles
$sql = "SELECT * FROM Articles";
//echo $sql;
$stmt = $conn->prepare($sql);
$stmt->execute();
// Nombre d'Articles
$nb = $stmt->rowCount();
//echo $nb;

if ($nb >= 1) {

  // Tableau des Articles
  $tab = $stmt->fetchAll();
  //var_dump($tab);

  
  echo '<div class="slideshow-container">';

  
  for ($i=1; $i<= $nb; $i++) {

    echo '<div class="mySlides fade">';

    echo '<div class="numbertext">' . $i . ' / ' . $nb . '</div>';
    echo '<img src="images-carrousel/img' . $i .'.jpg" style="width:100%" height="70%">';
    echo '<div class="text">Caption ' . $i . '</div>';

    echo '</div>';


  }

  echo '<a class="prev" onclick="plusSlides(-1)">&#10094;</a>';
  echo '<a class="next" onclick="plusSlides(1)">&#10095;</a>';

  
  echo '</div>';
  echo '</div>';

  echo '<br>';

  // The dots/circles
  echo '<div style="text-align:center">';
  for ($i=1; $i<= $nb; $i++) {

    echo '<span class="dot" onclick="currentSlide(' . $i . ')"></span>';

  }

  echo '</div>';
  

}

?>


<!-- Les Ptits Blocs -->
<div style="width: 80%; margin-left: auto; margin-right: auto;">
<h1 class="m116">DERNIERS AJOUTS</h1>
</div>

  <div id="blocprinc">



    <div class="itemcard">

        <img src="images-carrousel/img4.jpg" class="imgcard-marvel">

      <div class="bottomcard">
      <span style="text-align: center;"> MARVEL </span>

      </div>

    </div>


    <div class="itemcard">
      
      <img src="images-carrousel/img3.jpg" class="imgcard-sonic">
      <span style="text-align: center;"> SONIC </span>
      
    </div>


    <div class="itemcard">
      
      <img src="images-carrousel/img1.jpg" class="imgcard-pokemon">
      <span style="text-align: center;"> POKEMON </span>
      
    </div>

  </div>



</div>



<?= include ('footer.php'); ?>







<!-- Les Scripts -->



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="js/script.js"></script>





 

<!-- jQuery UI -->



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  

</body>

</html>