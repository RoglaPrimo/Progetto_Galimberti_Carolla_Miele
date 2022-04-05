<?php
    session_start();

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";

    if(!isset($_SESSION['E_mail'])){
		header('location: ../index.php');
	}
	if( $_SESSION["tipologia"]!="cliente"){
	    header('location: logout.php');
	}

    // $username = $_SESSION["username"];
	// //echo $username;

	// $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// 	if(isset($_POST['cod_libri'])){
	// 		$libri = $_POST['cod_libri'];
	// 	} else {
	// 		$libri = array();
	// 	}
	// 	// $libri = isset($_POST['cod_libri']) ? $_POST['cod_libri'] : array(); // è un if else
	// 	foreach($libri as $libro) {
  	// 		//echo $libro . '<br/>';
  	// 		$sql = "UPDATE libri
  	// 				SET username_utente = '$username'
  	// 				WHERE cod_libro = '$libro'";
	// 		$conn->query($sql) or die("<p>Query fallita!</p>");
	// 	}
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negozio</title>
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    <h1>SCEGLI IL MIELE CHE TI INTERESSA</h1>
    <p>Ecco tutti i nostri mieli:</p>

    <form action="negozio.php" method="post">
        <table>
            <tr>
                <td>
                    <input type="radio" name="tipologia" value="cliente"> Miele d'acacia
                    <input type="radio" name="tipologia" value="apicoltore"> Miele di castagno
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="tipologia" value="cliente"> Miele di tiglio
                    <input type="radio" name="tipologia" value="apicoltore"> Miele di tarassaco
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="tipologia" value="cliente"> Miele di rododendro
                    <input type="radio" name="tipologia" value="apicoltore"> Miele millefiori
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="tipologia" value="cliente"> Miele di timo
                    <input type="radio" name="tipologia" value="apicoltore"> Miele di girasole
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="tipologia" value="cliente"> Miele di erba medica
                    <input type="radio" name="tipologia" value="apicoltore"> Miele d'eucalipto
                </td>
            </tr>
            <tr>
                <td>
                    <p>Data di confezionamento: </p>
                </td>
                <td>
                    <input type="date" name="Data_confezionamento" value="" required>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>