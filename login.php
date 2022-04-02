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

        <p>Non ti sei ancora registrato? <a href = 'registrazione.php'>Registrati</a></p> 

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
                    

                    $ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");

                    echo "";
                    if($ris->num_rows == 0){
						echo "<p>Utente non trovato o password errata</p>";
						$conn->close();
					} 
					else {
						$_SESSION["username"]=$username;
                        $_SESSION["tipologia"]=$_POST["tipologia"];
												
						$conn->close();
						header("location: pagine/home.php");

					}
                }
            }
        ?>


    </div>
</body>

</html>