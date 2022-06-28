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

<?php include("nav.php"); ?>

<main>
  <div class="container py-4">
    
<main>
    <h1>
        Formulaire Remplissement Auto
    </h1>
    <section>
        <form method="post" action="traitement.php">
    <p>
       <label for="pseudo">Nom</label> : <input type="text" name="Nom" id="Nom" />
       <label for="imagepost">Ajouter image :</label>
        <input type="file" id="imagepost" name="imagepost" accept="image/png, image/jpeg">
    </p>
    <p>
       <label for="bio">Bio</label> : <input type="text" name="bio" id="bio" />
    </p>
    <p>
       <label for="order1">Ordre 1</label> : <input type="text" name="order1" id="order1" />
       <label for="bioorder1">Ordre 1 bio</label> : <input type="text" name="bioorder1" id="bioorder1" />
       <label for="imagepost2">Ajouter image :</label>
        <input type="file" id="imagepost2" name="imagepost2" accept="image/png, image/jpeg">
    </p>
    <p>
       <label for="order2">Ordre 2</label> : <input type="text" name="order2" id="order2" />
       <label for="bioorder2">Ordre 2 bio</label> : <input type="text" name="bioorder2" id="bioorder2" />
       <label for="imagepost3">Ajouter image :</label>
       <input type="file" id="imagepost3" name="imagepost3" accept="image/png, image/jpeg">

    </p>    
        </form>
    </section>

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