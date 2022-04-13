<?php
session_start();

if (isset($_POST["E_mail"])) $E_mail = $_POST["E_mail"]; else $E_mail = "";
if (isset($_POST["Password"])) $Password = $_POST["Password"]; else $Password = "";

$db_servername = "localhost";
$db_name = "miele";
$db_username = "root";
$db_password = "";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di login</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="contenitore_login">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h1>LOGIN</h1>
            <h2>Inserisci le tue credenziali:</h2>
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="E_mail" value="" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="Password" value="" required></td>
                </tr>
                <tr>
                    <td>
                        Acquirente <input type="radio" name="tipologia" value="cliente">
                        Apicoltore <input type="radio" name="tipologia" value="apicoltore">
                    </td>
                </tr>
            </table>
            <p><input type="submit" value="Accedi"></p>
        </form>

        <p>Non ti sei ancora registrato? <a href='registrazione.php'>Registrati</a></p>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["E_mail"]) or empty($_POST["Password"])) {
                echo "<p>Campi lasciati vuoti</p>";
            } else {
                $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
                if ($conn->connect_error) {
                    die("<p>Connessione al server non riuscita: " . $conn->connect_error . "</p>");
                }


                $tipologia = $_POST["tipologia"];

                $myquery = "SELECT E_mail, Password 
                                    FROM $tipologia 
                                    WHERE E_mail='" . $_POST["E_mail"] . "'
                                        AND Password='" . $_POST["Password"] . "'";

                // $myquery = "SELECT E_mail, Password 
                //                 FROM $tipologia 
                //                 WHERE E_mail='.$_POST["E_mail"].'
                //                     AND password='.$_POST["Password"].'";


                $ris = $conn->query($myquery) or die("<p>Query fallita! " . $conn->error . "</p>");

                echo "";
                if ($ris->num_rows == 0) {
                    echo "<p>Utente non trovato o password errata</p>";
                    $conn->close();
                } else {
                    

                    
                    // $_SESSION["E_mail"] = $_POST["E_mail"];
                    // $_SESSION["Password"] = $Password;
                    $_SESSION["tipologia"] = $_POST["tipologia"];
                    
                    if ($tipologia == "apicoltore") {
                            $sql= "SELECT apicoltore.Codice_apicoltore AS codice
                                    FROM apicoltore
                                    WHERE apicoltore.E_mail= '$E_mail' AND apicoltore.Password='$Password'";
                    
                        $ris = $conn->query($myquery) or die("<p>Query fallita! " . $conn->error . "</p>");

                        // $row = $ris->fetch_assoc();
                        foreach($ris as $row) {
                            echo $row["codice"];
                        }
                        echo $row["Codice_apicoltore"];
                        $_SESSION["Codice_utente"]= $row["Codice_apicoltore"];



                        echo $_SESSION["Codice_utente"];

                        $conn->close();

                        // header("location: home_apicoltore.php");
                    } else {
                        header("location: home_cliente.php");
                    }
                }
            }
        }
        ?>


    </div>
</body>

</html>