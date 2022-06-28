<?php
session_start();



include_once('php/config.php');
include_once('php/functions.php');
include "db.php";

if(isset($_GET["section"])) {
    $section = htmlspecialchars($_GET["section"]);
} else {
    $section = "";
}

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['recup_submit'], $_POST['recup_mail'])) {
    if (!empty($_POST['recup_mail'])) {
        $recup_mail = htmlspecialchars($_POST['recup_mail']);
        if (filter_var($recup_mail, FILTER_VALIDATE_EMAIL)) {
            $mailexist = $conn->prepare('SELECT id,pseudo FROM Membres WHERE mail = ?');
            $mailexist->execute(array($recup_mail));
            $mailexist_count = $mailexist->rowCount();
            if ($mailexist_count == 1) {
                $pseudo = $mailexist->fetch();
                $pseudo = $pseudo['pseudo'];


                $_SESSION['recup_mail'] = $recup_mail;
                $recup_code = "";
                for ($i = 0; $i < 8; $i++) {
                    $recup_code .= mt_rand(0, 9);
                }
                $_SESSION['recup_code'] = $recup_code;

                $mail_recup_exist = $conn->prepare('SELECT id FROM recuperation WHERE mail = ?');
                $mail_recup_exist->execute(array($recup_mail));
                $mail_recup_exist = $mail_recup_exist->rowCount();

                if ($mail_recup_exist == 1) {
                    $recup_insert = $conn->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
                    $recup_insert->execute(array($recup_code, $recup_mail));
                } else {

                    $recup_insert = $conn->prepare('INSERT INTO recuperation(mail,code) VALUES (?,?)');
                    $recup_insert->execute(array($recup_mail, $recup_code));
                }
                /*$header = "MIME-Version: 1.0\r\n";
                $header .= 'From:"[VOUS]"<votremail@mail.com>' . "\n";
                $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
                $header .= 'Content-Transfer-Encoding: 8bit';
                $message = '
                <html>
                <head>
                    <title>Récupération de mot de passe - Votre site</title>
                    <meta charset="utf-8" />
                </head>
                <body>
                 <font color="#303030";>
                     <div align="center">
                    <table width="600px">
                         <tr>
                         <td>

                            <div align="center">Bonjour <b>' . $pseudo . '</b>,</div>
                            Cliquez <a href="https://stanime.fr/recuperation.php?section="code&cpde='.$recup_code.'">ici </a> pour réinitialiser votre mot de passe.
                            A bientôt sur <a href="http://stanime.fr/">Votre site</a> !


                         </td>
                         </tr>
                         <tr>
                         <td align="center">
                            <font size="2">
                             Ceci est un email automatique, merci de ne pas y répondre
                            </font>
                         </td>
                         </tr>
                    </table>
                     </div>
                 </font>
                </body>
                </html>
                ';*/
                $url = $_SERVER["HTTP_ORIGIN"] . $_SERVER["REQUEST_URI"];
                $message = "Bonjour, Afin de réinitialiser votre mot de passe veuillez cliquer sur ce lien : \n$url?section=code&code='" . $recup_code . "',\n VOTRE CODE EST : '" . $recup_code . "'";

                mail($recup_mail, "Récupération de mot de passe - Chronologia", $message);
                header("Location:http://stanime.fr/recuperation.php?section=code");
            } else {
                $error = "Cette adresse mail n'est pas enregistrée";
            }
        } else {
            $error = "Adresse mail invalide";
        }
    } else {
        $error = "Veuillez entrer votre adresse mail";
    }
}

if(isset($_POST["verif_submit"], $_POST["verif_code"])) {
    if(!empty($_POST["verif_code"])) {
        try {
            $verif_code = htmlspecialchars($_POST["verif_code"]);
            $sql = "SELECT id FROM recuperation WHERE mail = ? AND code = ?";
            //echo $sql;
            $stmt = $conn->prepare($sql);
            //var_dump($_SESSION["recup_mail"]);
            $stmt->execute(array($_SESSION["recup_mail"], $verif_code));
            $nb = $stmt->rowCount();
            //echo $nb;
            if ($nb == 1){
                $update = "UPDATE recuperation SET confirme = 1 WHERE mail = ?";
                $stmt = $conn->prepare($update);
                $stmt->execute(array($_SESSION["recup_mail"]));
                header("Location: $url?section=changemdp");
            } else {
                $error = "Code invalide";
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        $error = "Veuillez entrer votre code de confirmation";
    }
}

if (isset($_POST["change_submit"])) {
    if (isset($_POST["change_mdp"], $_POST["change_mdpc"])) {
        try {
            $sql = "SELECT confirme FROM recuperation WHERE mail = ?";
            //echo $sql;
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($_SESSION["recup_mail"]));
            $verif_confirm = $stmt->fetch();
            //var_dump($verif_confirm);
            $verif_confirm = $verif_confirm["confirme"];
            if ($verif_confirm == 1) {

                $mdp = sha1(htmlspecialchars($_POST["change_mdp"]));
                $mdpc = sha1(htmlspecialchars($_POST["change_mdpc"]));
                if (!empty($mdp) and !empty($mdpc)) {
                    if ($mdp == $mdpc) {
                        $sql = "UPDATE Membres SET motdepasse = ? WHERE mail = ?";
                        //echo $sql;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(array($mdp, $_SESSION["recup_mail"]));

                        $sql = "DELETE FROM recuperation WHERE mail = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(array($_SESSION["recup_mail"]));
                        header("Location: ./index.php");
                    } else {
                        $error = "Vos mots de passes ne correspondent pas";
                    }
                } else {
                    $error = "Veuillez remplir tous les champs";
                }
            } else {
                $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail.";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        $error = "Veuillez remplir tous les champs";
    }


}

include './recuperationView.php';

?>