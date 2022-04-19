<?php
session_start();

if (isset($_SESSION["Codice_utente"])) $Codice_utente = $_SESSION["Codice_utente"];
else header('location: login.php');
if (isset($_SESSION["Numero_telefono"])) $Numero_telefono = $_SESSION["Numero_telefono"];
else $Numero_telefono = "";
// if(isset($_SESSION["Password"])) $Password = $_SESSION["Password"];  header('location: login.php');

$db_servername = "localhost";
$db_name = "miele";
$db_username = "root";
$db_password = "";

if ($_SESSION["tipologia"] != "apicoltore") {
    header('location: logout.php');
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />

    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">

</head>

<body>
  

    <div class="header">
        <ul class="header__menu">
            <!-- <li><a id="colore" href="index.php">Chi siamo</a></li> -->
            <li><a  href="miele.php">I nostri prodotti</a></li>
            <li><a  id="active" href="magazzino.php " >Magazzino</a></li>
            <li class="header__img">
                <a href=""><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
            </li>
            <li><a id="colore" href="vendite.php">Le tue vendite</a></li>
            <li><a id="colore" href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="container__Intro">
        <div class="container__Intro__text reveal" id="backwhite2">
            <h1>LA NOSTRA COLLABORAZIONE</h1>

            <?php
            $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
            // echo "$Codice_utente";
            // $sql= "SELECT apicoltore.Codice_apicoltore AS Codice
            //         FROM apicoltore
            //         WHERE apicoltore.E_mail= '$E_mail' AND apicoltore.Password='$Password'";

            // $ris = $conn->query($sql) or die("<p>Query fallita!-$conn->error</p>");
            // $row = $ris->fetch_assoc();
            // $Codice_apicoltore= $row["Codice"];

            $sql1 = "SELECT magazzino.Codice_magazzino, magazzino.Citta
                FROM magazzino";

            $ris1 = $conn->query($sql1) or die("<p>Query fallita!-$conn->error</p>");

            echo "<p id='corsivo'> Ecco elencati di seguito i prodotti che hai venduto e che sono ancora presenti nei nostri magazzini: </p>";

            while ($riga = $ris1->fetch_assoc()) {
                $Codice_magazzino = $riga["Codice_magazzino"];
                $Citta = $riga["Citta"];

                $sql2 = "SELECT barattolo.Codice_barattolo, barattolo.Capienza, barattolo.Nome_miele, barattolo.Data_confezionamento, barattolo.Data_immagazzinamento
                FROM barattolo
                WHERE barattolo.Codice_apicoltore= $Codice_utente AND barattolo.Codice_magazzino=$Codice_magazzino";

                $ris2 = $conn->query($sql2) or die("<p>Query fallita!-$conn->error</p>");

                // echo "
                //     <table>
                //         <tr> <th></th> <th>Codice del magazzino</th> <th>Comune</th></tr>
                //         <tr>
                //                 <td>$Codice_magazzino</td>
                //                 <td>$Citta</td>
                //         </tr>
                //     ";

                if ($ris2->num_rows == 0) {
                    echo "
                <table class='tab_dati_personali2'>
                    <tr> <th style='color: black;' class='paddingaggiuntivo'>Codice del magazzino</th> <th style='color: black;' >Comune</th></tr>
                    <tr>
                            <td class='Login paddingaggiuntivo'  style='text-align:center'>$Codice_magazzino</td>
                            <td  class='Login paddingaggiuntivo' style='text-align:center'>$Citta</td>
                    </tr>
                    <tr><td colspan='2'><p>Nessuno dei tuoi barattoli è ancora <br>
                    all'interno del magazzino</p></td></tr>
                ";
                } else {
                    echo "
                <table class='tab_dati_personali2 paddingaggiuntivo'>
                    <tr>  <th style='color: black;' class='paddingaggiuntivo'>Codice del magazzino</th> <th style='color: black;' class='paddingaggiuntivo'>Comune</th></tr>
                    <tr>
                            <td style='text-align:center'>$Codice_magazzino</td>
                            <td style='text-align:center'>$Citta</td>
                    </tr>
                ";
                    echo "<tr>  <th  style='color: black;' class='paddingaggiuntivo'>Codice del barattolo</th> <th  style='color: black;' class='paddingaggiuntivo'>Capienza del barattolo</th> <th  style='color: black;' class='paddingaggiuntivo'>Tipo di miele</th> <th  style='color: black;' class='paddingaggiuntivo'>Data di confezionamento</th> <th  style='color: black;' class='paddingaggiuntivo'>Data di immagazzinamento</th></tr>";

                    while ($pippo = $ris2->fetch_assoc()) {
                        $Codice_barattolo = $pippo["Codice_barattolo"];
                        $Capienza = $pippo["Capienza"];
                        $Nome_miele = $pippo["Nome_miele"];
                        $Data_confezionamento = $pippo["Data_confezionamento"];
                        $Data_immagazinamento = $pippo["Data_immagazzinamento"];

                        echo "
                        <tr>
                            <td style='text-align:center'>$Codice_barattolo</td>
                            <td style='text-align:center'>$Capienza</td>
                            <td style='text-align:center'>$Nome_miele</td>
                            <td style='text-align:center'>$Data_confezionamento</td>
                            <td style='text-align:center'>$Data_immagazinamento</td>
                        </tr>
                    ";
                    };
                }
                echo "</table>";
            };
            ?>
        </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js" integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA==" crossorigin="anonymous"></script>

    <script>
        ScrollReveal().reveal('.reveal', {
            distance: '100px',
            duration: 1500,
            easing: 'cubic-bezier(.215, .61, .355, 1)',
            interval: 600
        });
        ScrollReveal().reveal('.reveal2', {
            distance: '100px',
            duration: 1500,
            easing: 'cubic-bezier(.215, .61, .355, 1)',
            origin: 'left',
            interval: 600
        });
        ScrollReveal().reveal('.reveal3', {
            distance: '100px',
            duration: 2000,
            easing: 'cubic-bezier(.215, .61, .355, 1)',
            origin: 'right',
            interval: 600
        });
        ScrollReveal().reveal('.zoom', {
            duration: 1500,
            easing: 'cubic-bezier(.215, .61, .355, 1)',
            interval: 200,
            scale: 0.65,
            mobile: false
        });
    </script>
</body>

</html>