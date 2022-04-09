<?php
session_start();

$db_servername = "localhost";
$db_name = "miele";
$db_username = "root";
$db_password = "";


if (isset($_POST["E_mail"])) $E_mail = $_POST["E_mail"];
else $E_mail = "";
if (isset($_POST["Password"])) $Password = $_POST["Password"];
else $Password = "";
if (isset($_POST["Conferma_Password"])) $Conferma_Password = $_POST["Conferma_Password"];
else $Conferma_Password = "";
if (isset($_POST["Nome"])) $Nome = $_POST["Nome"];
else $Nome = "";
if (isset($_POST["Cognome"])) $Cognome = $_POST["Cognome"];
else $Cognome = "";
if (isset($_POST["Numero_telefono"])) $Numero_telefono = $_POST["Numero_telefono"];
else $Numero_telefono = "";
if (isset($_POST["Città"])) $Città = $_POST["Città"];
else $Città = "";
if (isset($_POST["Via"])) $Via = $_POST["Via"];
else $Via = "";
if (isset($_POST["Civico"])) $Civico = $_POST["Civico"];
else $Civico = "";
if (isset($_POST["tipologia"])) $tipologia = $_POST["tipologia"];
else $tipologia = "";


?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di registrazione</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="contenitore_login">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h1>REGISTRAZIONE</h1>
            <h2>Inserisci le tue credenziali:</h2>

            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="Nome" <?php echo "value = '$Nome'" ?> required></td>
                </tr>
                <tr>
                    <td>Cognome:</td>
                    <td><input type="text" name="Cognome" <?php echo "value = '$Cognome'" ?> required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="E_mail" <?php echo "value = '$E_mail'" ?> required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="Password" <?php echo "value = '$Password'" ?> required></td>
                </tr>
                <tr>
                    <td>Conferma Password:</td>
                    <td><input type="password" name="Conferma_Password" <?php echo "value = '$Conferma_Password'" ?> required></td>
                </tr>
                <tr>
                    <td>Numero di telefono:</td>
                    <td><input type="text" name="Numero_telefono" <?php echo "value = '$Numero_telefono'" ?> required></td>
                </tr>
                <tr>
                    <td>Città:</td>
                    <td><input type="text" name="Città" <?php echo "value = '$Città'" ?> required></td>
                </tr>
                <tr>
                    <td>Via:</td>
                    <td><input type="text" name="Via" <?php echo "value = '$Via'" ?> required></td>
                </tr>
                <tr>
                    <td>Civico:</td>
                    <td><input type="text" name="Civico" <?php echo "value = '$Civico'" ?> required></td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <p>Registrati come: </p>
                        Acquirente <input type="radio" name="tipologia" value="cliente">
                        Apicoltore <input type="radio" name="tipologia" value="apicoltore">
                    </td>
                </tr>
            </table>
            <p><input type="submit" value="Registrati"></p>
        </form>

        <p>
            <?php
            $tipologia=$_POST["tipologia"];
            if (isset($_POST["E_mail"]) and isset($_POST["Password"])) {
                if ($_POST["E_mail"] == "" or $_POST["Password"] == "") {
                    echo "Email e password non possono essere vuoti!";
                } elseif ($_POST["Password"] != $_POST["Conferma_Password"]) {
                    echo "Le password inserite non corrispondono";
                } else {
                    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
                    if ($conn->connect_error) {
                        die("<p>Connessione al server non riuscita: " . $conn->connect_error . "</p>");
                    }

                    $myquery = "SELECT E_mail
						    FROM $tipologia
						    WHERE E_mail='" . $_POST["E_mail"] . "'";
                    //echo $myquery;

                    $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "<p>Sei già registrato! Vai alla pagina di login: <a href = 'login.php'>Vai alla pagina di login</a></p>";
                    } else {

                        $myquery = "INSERT INTO $tipologia (E_mail, Password, Nome, Cognome, Numero_telefono, Città, Via, Civico)
                                    VALUES ('$E_mail', '$Password', '$Nome', '$Cognome','$Numero_telefono','$Città','$Via','$Civico')";

                        /*
                        // Versione con l'uso dell'hash
                        $password_hash = password_hash($password, PASSWORD_DEFAULT);

                        $myquery = "INSERT INTO utenti (username, password, nome, cognome, email, telefono, comune, indirizzo)
                                    VALUES ('$username', '$password_hash', '$nome', '$cognome','$email','$telefono','$comune','$indirizzo')";
                        */

                        if ($conn->query($myquery) === true) {
                            session_start();
                            $_SESSION["E_mail"] = $E_mail;
                            $_SESSION["tipologia"] = $_POST["tipologia"];

                            $conn->close();
                            echo "Registrazione effettuata con successo!<br>sarai ridirezionato alla home tra 5 secondi.";
                            if ($tipologia == "apicoltore") {
                                header('Refresh: 5; URL=home_apicoltore.php');
                            } else {
                                header('Refresh: 5; URL=home_cliente.php');
                            }
                        } else {
                            echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                        }
                    }
                }
            }
            ?>
        </p>

    </div>