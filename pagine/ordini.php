<?php
    session_start();

    if(isset($_SESSION["E_mail"])) $E_mail = $_SESSION["E_mail"];  else $E_mail = "";
    if(isset($_SESSION["Numero_telefono"])) $Numero_telefono = $_SESSION["Numero_telefono"];  else $Numero_telefono = "";
    if(isset($_SESSION["Password"])) $Password = $_SESSION["Password"];  else $Password = "";

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";

    if($_SESSION["tipologia"]!="cliente"){
	    header('location: logout.php');
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo carrello</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>Ecco qui il suo carrello:</h1>
</body>
</html>