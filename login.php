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
        <h1>LOGIN</h1>
        <h2>Inserisci le tue credenziali:</h2>
            <table>
                <tr>
                    <td>Email:</td> <td><input type="text" name="Email" value="" required></td>
                </tr>
                <tr>
                    <td>Password:</td> <td><input type="text" name="Password" value="" required></td>
                </tr>
                <tr>
                    <td>
                        Acquirente <input type="radio" name="tipologia" value="acquirenti">
                        Apicoltore <input type="radio" name="tipologia" value="apicoltori">
                    </td>
                </tr>
            </table>
            <p><input type="submit" value="Accedi"></p>
        </form>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if( empty($_POST["Email"]) or empty($_POST["Password"])) {
                    echo "<p>Campi lasciati vuoti</p>";
                } else {
                    $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
                    if($conn->connect_error){
                        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                    }


                    $tabella=$_POST["tipologia"];
                    
                    $myquery = "SELECT Email, Password 
                                    FROM $tabella 
                                    WHERE Email=".$_POST["Email"]."
                                        AND Password=".$_POST["Password"];
                    echo $myquery;
                }
            }
        ?>



    </div>
</body>

</html>