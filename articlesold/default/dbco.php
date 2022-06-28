        <?php
        $db_server = 'stanimqstartos.mysql.db'; // Adresse du serveur MySQL
      $db_name = 'stanimqstartos';            // Nom de la base de données
      $db_user_login = 'stanimqstartos';  // Nom de l'utilisateur
      $db_user_pass = 'Negro123';       // Mot de passe de l'utilisateur

      // Ouvre une connexion au serveur MySQL
      $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);
      ?>