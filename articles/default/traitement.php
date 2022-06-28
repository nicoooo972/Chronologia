<?php

$servername = "stanimqstartos.mysql.db";
$username = "stanimqstartos";
$password = "Negro123";
$dbname = "stanimqstartos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    $title = $_POST["nom[1]"]; 
    $date = $_POST["Date"];
    $bio = $_POST["bio"];
    $licence = $_POST["licence"];
    $id= $_POST["ID1"];
    $so= $_POST["so"];

    $sql ="CREATE TABLE $licence (
        Titre VARCHAR(64),
        Dates DATE,
        Bio VARCHAR(256) ,
        id int(50) UNSIGNED,
        parent_id int(50),
        so BOOLEAN, 
        PRIMARY KEY (Titre)
        )";
        if ($conn->query($sql) === TRUE) {
            echo "Table MyGuests created successfully";
          } else {
            echo "Error creating table: " . $conn->error;
          }

          $add = "INSERT INTO $licence (Bio, id)
          VALUES ($bio,  $id)";
          
          if (mysqli_query($conn, $add)) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $add . "<br>" . mysqli_error($conn);
          }
          

?>
<body>
Bienvenue <?php echo $_POST["licence"] ; ?> ! <br>
fff :<?php echo $_POST["nom[1]" ] ; ?>.
<?php echo $_POST["bio" ] ; ?>.
<?php echo $_POST["licence" ] ; ?>.
<?php echo $_POST["ID1" ] ; ?>.
<?php echo $_POST["so" ] ; ?>.


</body>