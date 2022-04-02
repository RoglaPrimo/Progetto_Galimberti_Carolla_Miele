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
                    <td>Email:</td> <td><input type="text" name="Email" value="" required></td>
                </tr>
                <tr>
                    <td>Password:</td> <td><input type="text" name="Password" value="" required></td>
                </tr>
                <tr>
                    <td>Conferma Password:</td> <td><input type="text" name="Conferma_Password" value="" required></td>
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

        <p>
        <?php
            if(isset($_POST["Email"]) and isset($_POST["Password"])) {
                if ($_POST["Email"] == "" or $_POST["Password"] == "") {
                    echo "Email e password non possono essere vuoti!";
                } elseif ($_POST["Password"] != $_POST["conferma"]){
                    echo "Le password inserite non corrispondono";
                } else {
                    $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
                    if($conn->connect_error){
                        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                    }

                    $myquery = "SELECT Email 
						    FROM cliente and apicoltore 
						    WHERE Email='" . $_POST["Email"] . "'";
                    //echo $myquery;

                    $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "<p>Sei già registrato! Vai alla pagina di login: <a href = 'login.php'>Vai alla pagina di login</a></p>";
                    } else {

                        $myquery = "INSERT INTO $tipologia (Email, Password, Nome, Cognome, Numero_telefono, Città, Via, Civico)
                                    VALUES ('$_POST["Email"]', '$_POST["Password"]', '$_POST["Nome"]', '$_POST["Cognome"]','$_POST["Numero_telefono"]','$_POST["Città"]','$_POST["Via"]','$_POST["Civico"]')";

                        /*
                        // Versione con l'uso dell'hash
                        $password_hash = password_hash($password, PASSWORD_DEFAULT);

                        $myquery = "INSERT INTO utenti (username, password, nome, cognome, email, telefono, comune, indirizzo)
                                    VALUES ('$username', '$password_hash', '$nome', '$cognome','$email','$telefono','$comune','$indirizzo')";
                        */

                        if ($conn->query($myquery) === true) {
                            session_start();
                            $_SESSION["username"]=$username;
                            $_SESSION["tipologia"]=$_POST["tipologia"];
                            
						    $conn->close();

                            echo "Registrazione effettuata con successo!<br>sarai ridirezionato alla home tra 5 secondi.";
                            header('Refresh: 5; URL=home.php');

                        } else {
                            echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                        }
                    }
                }
            }
            ?>
        </p>

    </div>    