<!doctype html>

<html lang="fr">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width">

  <title>Chronologia</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="../imgTest/favicon.png">



  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- /!\ -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



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

  <div id="blocprinc">

    <div class="itemcard">

      <img src="images-carrousel/img2.jpg" class="imgcard-pokemon">
      <span style="text-align: center;"> Jujutsu Kaisen </span>

    </div>


    <div class="itemcard">

      <img src="images-carrousel/img1.jpg" class="imgcard-pokemon">
      <span style="text-align: center;"> Persona </span>

    </div>


    <div class="itemcard">

      <img src="images-carrousel/img1.jpg" class="imgcard-pokemon">
      <span style="text-align: center;"> Nier </span>

    </div>

  </div>

  


  </div>



  <? include('footer.php'); ?>

  <!-- Les Scripts -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <script src="js/script.js"></script>


  <!-- jQuery UI -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>



</body>

</html>