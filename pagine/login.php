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
            <li><a id="colore" href="registrazione.php">Registrati</a></li>
        </ul>
    </div>
    <div class="container__Intro">
    <div class="container__Intro__text reveal" id="backwhite">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h1>LOGIN</h1>
            <h2 id="smaller">Inserisci le tue credenziali:</h2>
            <table class="tab_dati_personali">
                <tr>
                    <td class="Login">Email:</td>
                    <td class="Login"><input class="caselle" type="text" name="E_mail" value="" required></td>
                </tr>
                <tr>
                    <td class="Login">Password:</td>
                    <td class="Login"><input class="caselle" type="password" name="Password" value="" required></td>
                </tr>
                <tr>
                    <td style="text-align: center; padding-top: 10px" colspan="2" class="Login">
                        Acquirente <input type="radio" name="tipologia" value="cliente" checked>
                        Apicoltore <input type="radio" name="tipologia" value="apicoltore">
                    </td>
                </tr>
            </table>
            <p><input class="caselle" id="accedi" type="submit" value="Accedi"></p>
        </form>

        <p id="corsivo">Non ti sei ancora registrato? <a href='registrazione.php'>Registrati</a></p>

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
                    
                        $ris = $conn->query($sql) or die("<p>Query fallita! " . $conn->error . "</p>");

                        $row = $ris->fetch_assoc();
                        $_SESSION["Codice_utente"]= $row["codice"];

                        $conn->close();
                        header("location: home_apicoltore.php");
                    } else {
                            $sql= "SELECT cliente.Codice_cliente AS codice
                                FROM cliente
                                WHERE cliente.E_mail= '$E_mail' AND cliente.Password='$Password'";
        
                            $ris = $conn->query($sql) or die("<p>Query fallita! " . $conn->error . "</p>");

                            $row = $ris->fetch_assoc();
                            $_SESSION["Codice_utente"]= $row["codice"];

                        $conn->close();
                        header("location: home_cliente.php");
                    }
                }
            }
        }
        ?>


    </div>
        <video autoplay muted loop id="video-back">
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