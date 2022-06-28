<?

/******************************************************************************
 * Init some variables with values from $_POST so we don't have to keep typing*
 * the full array list name whenever we want to use the values.               *
 * ****************************************************************************/



$Name		=	$_POST['Name'];
$headline	=	$_POST['inHeadline'];
$opening	=	$_POST['inOpening'];
$quote		=	$_POST['inQuote'];
$attrib		=	$_POST['inAttrib'];
$font1		=	$_POST['fonts1'];
$font2		=	$_POST['fonts2'];
$font3		=	$_POST['fonts3'];
$font4		=	$_POST['fonts4'];
$textOffer1	=	$_POST['inOffer1'];
$addOffer1	=	$_POST['inAdditional1'];
$textOffer2	=	$_POST['inOffer2'];
$addOffer2	=	$_POST['inAdditional2'];
$qrSize		=	$_POST['inQrSize'];
$qrData1	=	$_POST['inQrData1'];
$qrData2	=	$_POST['inQrData2'];

		if (isset($_POST['submit'])) 
		{

		$nom = $_POST['Name']; // Le nom du répertoire à créer

		// Vérifie si le répertoire existe :
		if (is_dir($nom)) {
						echo 'Le répertoire existe déjà!';  
						}
		// Création du nouveau répertoire
		else { 
			mkdir($nom);
			mkdir($nom . '/uploads');
			echo 'Le répertoire '.$nom.' vient d\'être créé! <br>';      
			}
		}

	  if (isset($_POST['submit'])) 
	  {
		  $maxSize = 2097152;
		  $validtext = array('.jpg', '.jpeg', '.gif', '.png');
	  
		  if ($_FILES['upload_file']['error'] > 0) 
		  {
			  echo "Une erreur est survenue lors du transfert";
			  die;
		  }
	  
		  $fileSize = $_FILES['upload_file']['size'];
	  
		  if ($fileSize > $maxSize) 
		  {
			  echo "le fichier est trop gros";
			  die;
		  }
	  
		  $fileName = $_FILES['upload_file']['name'];
	  
		  $fileExt = "." . strtolower(substr(strrchr($fileName, "."), 1));
	  
		  if (!in_array($fileExt, $validtext)) {
			  echo "le fichier n'est pas une image !";
			  die;
		  }
	  
		  $tmpName = $_FILES['upload_file']['tmp_name'];
		  $uniqueName = md5(uniqid(rand() . true));
		  $fileName =  $nom . "/" . "uploads/" . $uniqueName . $fileExt;
		  $resultat = move_uploaded_file($tmpName, $fileName);
	  
		  if ($resultat) 
		  {
			  echo "Transfert terminé ! ";
		  }
	  }
	  


/******************************************************************************
 * Build a page generator string using the values passed from form.           *
 ******************************************************************************/

$strOut	=	'<!DOCTYPE html>'
		.	'<html'
		.	"'>"
		.	'<head>'
	  	.	'<?php include("http://stanime.fr/head.php"); ?>'
		.	'</head>';

$strOut	=	$strOut
		.	'<body>'
		.	'<?php include("http://stanime.fr/nav.php"); ?>'
		. 	'<?php include("http://stanime.fr/titreimgsyn.php"); ?>'
		.	'</body>'
		.	'<script src="assets/js/jquery.js"></script>'
		.	'<script src="assets/js/bootstrap.js"></script>'
		.	'</html>';

/******************************************************************************
 * Create a text file to accept the output string					          *
 ******************************************************************************/
$f = fopen($nom . '/' . $Name . '.php', "w"); 
rename($f, $nom . '/');

fwrite($f, $strOut); 
fclose($f);  


/******************************************************************************
 * Give some feedback and a test link                                         *
 ******************************************************************************/
echo('<a href="' . $nom . '/' . $Name . '.php' . '">Clique ici </a> <br>pour voir si la page a été généré correctement');


?>



