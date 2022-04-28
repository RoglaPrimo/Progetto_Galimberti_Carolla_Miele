<?php
session_start();

$db_servername = "localhost";
$db_name = "miele";
$db_username = "root";
$db_password = "";


if (isset($_POST["E_mail"])) $E_mail = $_POST["E_mail"]; else $E_mail = "";
if (isset($_POST["Password"])) $Password = $_POST["Password"]; else $Password = "";
if (isset($_POST["Conferma_Password"])) $Conferma_Password = $_POST["Conferma_Password"]; else $Conferma_Password = "";
if (isset($_POST["Nome"])) $Nome = $_POST["Nome"]; else $Nome = "";
if (isset($_POST["Cognome"])) $Cognome = $_POST["Cognome"]; else $Cognome = "";
if (isset($_POST["Numero_telefono"])) $Numero_telefono = $_POST["Numero_telefono"]; else $Numero_telefono = "";
if (isset($_POST["citta"])) $citta = $_POST["citta"]; else $citta = "";
if (isset($_POST["Via"])) $Via = $_POST["Via"]; else $Via = "";
if (isset($_POST["Civico"])) $Civico = $_POST["Civico"]; else $Civico = "";
if (isset($_POST["tipologia"])) $tipologia = $_POST["tipologia"]; else $tipologia = "";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("<p id='cursive' style='padding: 20px'>Connessione al server non riuscita: " . $conn->connect_error . "</p>");
}

$myquery = "SELECT Cognome
			FROM $tipologia
			WHERE E_mail='$E_mail'";
            //echo $myquery;

if (!empty($tipologia))
{
    $ris = $conn->query($myquery) or die("<p>Query fallita! ".$tipologia." ".$E_mail."</p>");
}

$esistente=false;
if($ris->num_rows > 0) $esistente=true;

if ($tipologia == "apicoltore" and $_POST["Password"]==$_POST["Conferma_Password"] and !$esistente) {
    header("Refresh:5; URL=home_apicoltore.php");
} 
if ($tipologia == "cliente" and $_POST["Password"]==$_POST["Conferma_Password"] and !$esistente) {
    header("Refresh:5; URL=home_cliente.php");
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di registrazione</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
    integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
    crossorigin="anonymous" />

    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css"
    integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ=="
    crossorigin="anonymous" />

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <style> @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap'); </style>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <ul class="header__menu">
            <li><a id="colore" href="miele.php">I nostri prodotti</a></li>
            <li class="header__img">
                <a href="../index.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
            </li>
            <li><a id="colore" href="login.php">Login</a></li>
        </ul>
    </div>

    <div class="container__Intro" id="container__Intro">
    <div class="container__Intro__text reveal group" id="backwhite">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h1>REGISTRAZIONE</h1>
            <h2 id="smaller">Inserisci le tue credenziali:</h2>

            <table class="tab_dati_personali">
                <tr>
                    <td class="Login">Nome:</td>
                    <td class="Login"><input class="caselle" type="text" name="Nome" <?php echo "value = '$Nome'" ?> required></td>
                </tr>
                <tr>
                    <td class="Login">Cognome:</td>
                    <td class="Login"><input class="caselle" type="text" name="Cognome" <?php echo "value = '$Cognome'" ?>required></td>
                </tr>
                <tr>
                    <td class="Login">Email:</td>
                    <td class="Login"><input class="caselle" type="text" name="E_mail" <?php echo "value = '$E_mail'" ?> required></td>
                </tr>
                <tr>
                    <td class="Login">Password:</td>
                    <td class="Login"><input class="caselle" type="password" name="Password" <?php echo "value = '$Password'" ?> required></td>
                </tr>
                <tr>
                    <td class="Login">Conferma Password:</td>
                    <td class="Login"><input class="caselle" type="password" name="Conferma_Password" <?php echo "value = '$Conferma_Password'" ?> required></td>
                </tr>
                <tr>
                    <td class="Login">Numero di telefono:</td>
                    <td class="Login"><input class="caselle" type="text" name="Numero_telefono" <?php echo "value = '$Numero_telefono'" ?>></td>
                </tr>
                <tr>
                    <td class="Login">citta:</td>
                    <td class="Login"><input class="caselle" type="text" name="citta" <?php echo "value = '$citta'" ?>></td>
                </tr>
                <tr>
                    <td class="Login">Via:</td>
                    <td class="Login"><input class="caselle" type="text" name="Via" <?php echo "value = '$Via'" ?>></td>
                </tr>
                <tr>
                    <td class="Login">Civico:</td>
                    <td class="Login"><input class="caselle" type="text" name="Civico" <?php echo "value = '$Civico'" ?>></td>
                </tr>
                <tr>
                    <td style="text-align: center; padding-top: 10px" colspan="2" class="Login">
                        <br>
                        <p id="padding">Registrati come: </p>
                        Acquirente <input id="padding" type="radio" name="tipologia" value="cliente" checked>
                        Apicoltore <input id="padding" type="radio" name="tipologia" value="apicoltore">
                    </td>
                </tr>
            </table>
            <p><input class="caselle" id="accedi" type="submit" value="Registrati"></p>
        </form>

    
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $tipologia=$_POST["tipologia"];
            if (isset($_POST["E_mail"]) and isset($_POST["Password"])) {
                if ($_POST["E_mail"] == "" or $_POST["Password"] == "") {
                    echo "Email e password non possono essere vuoti!";
                } elseif ($_POST["Password"] != $_POST["Conferma_Password"]) {
                    echo "<p id='cursive' style='padding: 20px'>Le password inserite non corrispondono</p>";
                } else {
                    

                    
                    if ($esistente) {
                        echo "<p id='cursive' style='padding: 20px'>Sei già registrato! <a class='hover' style='text-decoration: none' href = 'login.php'>Vai alla pagina di login</a></p>";
                    } else {
                        $_SESSION["E_mail"]=$E_mail;
                        $_SESSION["Password"]=$Password;
                        $_SESSION["Nome"]=$Nome;
                        $_SESSION["Cognome"]=$Cognome;
                        $_SESSION["Numero_telefono"]=$Numero_telefono;
                        $_SESSION["citta"]=$citta;
                        $_SESSION["Via"]=$Civico;
                        $_SESSION["Civico"]=$Civico;
                        
                        $myquery = "INSERT INTO $tipologia (E_mail, Password, Nome, Cognome, Numero_telefono, citta, Via, Civico)
                                    VALUES ('$E_mail', '$Password', '$Nome', '$Cognome','$Numero_telefono','$citta','$Via','$Civico')";

                        /*
                        // Versione con l'uso dell'hash
                        $password_hash = password_hash($password, PASSWORD_DEFAULT);

                        $myquery = "INSERT INTO utenti (username, password, nome, cognome, email, telefono, comune, indirizzo)
                                    VALUES ('$username', '$password_hash', '$nome', '$cognome','$email','$telefono','$comune','$indirizzo')";
                        */

                        if ($conn->query($myquery) === true) {
                            $_SESSION["E_mail"] = $E_mail;
                            $_SESSION["tipologia"] = $_POST["tipologia"];
                            $tipologia=$_SESSION["tipologia"];

                            $conn->close();
                            echo "<p id='cursive' style='padding: 20px'>Registrazione effettuata con successo!<br>Sarai ridirezionato alla home tra 5 secondi.</p>";
                            
                            
                        } else {
                            echo "<p id='cursive' style='padding: 20px'>Non è stato possibile effettuare la registrazione per il seguente motivo: </p>" . $conn->error;
                        }
                    }
                }
            }
            }
            
            ?>

        </div>
            <video autoplay muted loop id="video-back" id="video-back2">
                <source src="../immagini/Api, l'impollinazione - bees pollination Macro 1080p 60 fps Nikon 1 J2.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    </div>

    <?php
        include('footer.php');
    ?>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js"
        integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA=="
        crossorigin="anonymous"></script>

    <script>
        ScrollReveal().reveal('.reveal', { distance: '100px', duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 600 });
        ScrollReveal().reveal('.reveal2', { distance: '100px', duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)',origin:'left', interval: 600 });
        ScrollReveal().reveal('.reveal3', { distance: '100px', duration: 2000, easing: 'cubic-bezier(.215, .61, .355, 1)',origin:'right', interval: 600 });
        ScrollReveal().reveal('.zoom', { duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 200, scale: 0.65, mobile: false });
    </script>
</body>
</html>    