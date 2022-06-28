<!doctype html>

<html lang="fr">

<head>

  <meta charset="utf-8">

  <title>Acceuil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/jumbotron/">

  
</head>

<body>



<main>
  <div class="container py-4">
    
<main>

  <section class="py-5 text-center container" id="sect">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
   <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>  -->
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/img1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fate</h5>
        <p>Retrouvez toute la chronologie de la série Fate ici !</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/img2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Jujutsu kaisen</h5>
        <p>Retrouvez toute la chronologie de l'animé Jujutsu Kaisen ici !</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/img3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Transformers</h5>
        <p>Retrouvez toute la chronologie des films Transformers ici !</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/img4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Persona</h5>
        <p>Retrouvez toute la chronologie des jeux Persona ici !</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/img5.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Zelda</h5>
        <p>Retrouvez toute la chronologie des jeux Zelda ici !</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/img6.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Star wars</h5>
        <p>Retrouvez toute la chronologie des films et série Star Wars ici !</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </section>

  
  <h1 class="ml16">Derniers ajouts</h1>



    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
      <?php include("thumbnail1.php"); ?>
        
      <?php include("thumbnail2.php"); ?>

      <?php include("thumbnail3.php"); ?>

      <?php include("thumbnail4.php"); ?>

      <?php include("thumbnail5.php"); ?>

      <?php include("thumbnail6.php"); ?>



      </div>
    </div>
  </div>

</main>

<?php include("footer.php"); ?>

</main>
<script src="script.js" type="text/javascript"></script>
<script src="suggestion.js" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>