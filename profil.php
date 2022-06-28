<?php
session_start();
include "db.php";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_GET['id']) and $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $conn->prepare("SELECT * FROM Membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>Profil</title>
        <meta charset="utf-8">
    </head>

    <body class="body-profil">
        <!--<?php var_dump($_SESSION) ?>-->
        <div align="center">
            <h2 style="text-align:center;background-color:#1C2833;color:white;padding:1%;" >Profil de <?php echo $userinfo['pseudo']; ?></h2>
            <br /><br />
           <h2>Pseudo = <?php echo $userinfo['pseudo']; ?><br></h2> 
            <h2>Mail = <?php echo $userinfo['mail']; ?></h2> 
            <?php
            if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
            ?>
                <br>
                <a class="editProfil" href="editionProfil.php" style="color: #B0D7FF;">Editer mon profil</a>
                <a class="deconnexion" href="deconnexion.php" style="color: #B0D7FF;">Deconnexion</a>
            <?php
            }
            ?>
        </div>
    </body>

    </html>
<?php
}
?>