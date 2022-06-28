<?php
session_start();
require "db.php";
$con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    $email = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['mdp']);

    $check = $con->prepare('SELECT pseudo, email, motdepasse FROM Membres WHERE mail =?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $password = hash('sha256', $password);
            if ($data['mdp'] === $password) {
                $_SESSION['user'] == $data['pseudo'];
                header('Location:profil.php');
            } else header('Location:index.php?login_err=password');
        } else header('Location:index.php?login_err=email');
    } else header('Location:index.php?login_err=already');
} else header('Location:index.php');
