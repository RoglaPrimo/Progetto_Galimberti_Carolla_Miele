<?php
    session_start ();

    $server="localhost";
    $db_name="miele";
    $db_username="root";
    $db_password="";
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
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <h1>REGISTRAZIONE</h1>
        <h2>Inserisci le tue credenziali:</h2>
            <table>
                <tr>
                    <td>Nome:</td> <td><input type="text" name="Nome" value="" required></td>
                </tr>
                <tr>
                    <td>Cognome:</td> <td><input type="text" name="Cognome" value="" required></td>
                </tr>
                <tr>
                    <td>Email:</td> <td><input type="text" name="Email" value="" required></td>v
                </tr>
                <tr>
                    <td>Password:</td> <td><input type="text" name="Password" value="" required></td>
                </tr>
                <tr>
                    <td>Numero di telefono:</td> <td><input type="text" name="Numero_telefono" value="" required></td>
                </tr>
                <tr>
                    <td>Città:</td> <td><input type="text" name="Città" value="" required></td>
                </tr>
                <tr>
                    <td>Via:</td> <td><input type="text" name="Via" value="" required></td>
                </tr>
                <tr>
                    <td>Civico:</td> <td><input type="text" name="Civico" value="" required></td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <p>Registrati come: </p>
                        Acquirente <input type="radio" name="tipologia" value="acquirenti">
                        Apicoltore <input type="radio" name="tipologia" value="apicoltori">
                    </td>
                </tr>
            </table>
            <p><input type="submit" value="Registrati"></p>
        </form>