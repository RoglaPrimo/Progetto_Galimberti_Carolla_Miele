<?php
    session_start ();

    $server="localhost";
    $db_name="Progetto_Galimberti_Carolla_Miele";
    $db_username="root";
    $db_password="";

    $connessione= new mysqli ($server, $db_username, $db_password, $db_name);
    if($connessione->connect_error)
    {
        die("<p> connessione al server non riuscita:".$connessione->connect_error. "</p";)
    }
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="contenitore_login">

    </div>
</body>

</html>