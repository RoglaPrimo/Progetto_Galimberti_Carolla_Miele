<?php
session_start();
$mieli = array();
if (isset($_POST["Acacia"])) array_push($mieli, $_POST["Acacia"]);
if (isset($_POST["Castagno"]))  array_push($mieli, $_POST["Castagno"]);
if (isset($_POST["Tiglio"])) array_push($mieli, $_POST["Tiglio"]);
if (isset($_POST["Tarassaco"])) array_push($mieli, $_POST["Tarassaco"]);
if (isset($_POST["Rododendro"])) array_push($mieli, $_POST["Rododendro"]);
if (isset($_POST["Millefiori"])) array_push($mieli, $_POST["Millefiori"]);
if (isset($_POST["Timo"])) array_push($mieli, $_POST["Timo"]);
if (isset($_POST["Girasole"])) array_push($mieli, $_POST["Girasole"]);
if (isset($_POST["Erba_medica"])) array_push($mieli, $_POST["Erba_medica"]);
if (isset($_POST["Eucalipto"])) array_push($mieli, $_POST["Eucalipto"]);
if (isset($_POST["Capienza"])) $Capienza = $_POST["Capienza"];
else $Capienza = "NULL";
if ($Capienza == "") $Capienza = "NULL";
if (isset($_SESSION["Codice_utente"])) $Codice_cliente = $_SESSION["Codice_utente"];
else $Codice_cliente = "";

$db_servername = "localhost";
$db_name = "miele";
$db_username = "root";
$db_password = "";

// if(!isset($_SESSION['E_mail'])){
// 	header('location: ../index.php');
// }
if ($_SESSION["tipologia"] != "cliente") {
    header('location: logout.php');
}

// $E_mail = $_SESSION["E_mail"];
// $Codice_cliente= $_SESSION["Codice_cliente"];
//echo $username;

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Codice_barattolo'])) {
        $bellissimo = $_POST['Codice_barattolo'];
    } else {
        $bellissimo = array();
    }
    // $libri = isset($_POST['cod_libri']) ? $_POST['cod_libri'] : array(); // è un if else
    foreach ($bellissimo as $Caruccio) {
        //echo $libro . '<br/>';
        $sql = "UPDATE barattolo
  					SET Codice_cliente = '$Codice_cliente'
  					WHERE Codice_barattolo = '$Caruccio'";
        $conn->query('SET FOREIGN_KEY_CHECKS=0;');
        $ris = $conn->query($sql) or die("<p>Query fallita!-$conn->error</p>");
        $conn->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negozio</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />

    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">

</head>

<body class="footer_scuro">
    <div class="header">
        <ul class="header__menu">
            <li><a id="black" href="miele.php">I nostri prodotti</a></li>
            <li><a id="active" href="negozio.php">Negozio</a></li>
            <li class="header__img">
                <a href="home_cliente.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
            </li>
            <li><a id="black" href="ordini.php">Il tuo carrello</a></li>
            <li><a id="black" href="logout.php">Logout</a> </li>
        </ul>
    </div>

    <div class="container__Intro__text reveal" id="backwhite3">
        <h1>SCEGLI IL MIELE CHE TI INTERESSA E LA CAPIENZA DEL BARATTOLO</h1>

        <form action="negozio.php" method="post">

            <table class="tabella_input_2_colonne">
                <h2 style="font-size:xx-large;">Ecco tutti i nostri mieli:</h2>
                <tr>

                    <td> <input type="checkbox" name="Acacia" value="Acacia"> Miele d'acacia </td>
                    <td> <input type="checkbox" name="Castagno" value="Castagno"> Miele di castagno </td>

                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="Tiglio" value="Tiglio"> Miele di tiglio
                    </td>
                    <td> <input type="checkbox" name="Tarassaco" value="Tarassaco"> Miele di tarassaco
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="Rododendro" value="Rododendro"> Miele di rododendro
                    </td>
                    <td> <input type="checkbox" name="Millefiori" value="Millefiori"> Miele millefiori
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="Timo" value="Timo"> Miele di timo
                    </td>
                    <td> <input type="checkbox" name="Girasole" value="Girasole"> Miele di girasole
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="Erba_medica" value="Erba_medica"> Miele di erba medica
                    </td>
                    <td> <input type="checkbox" name="Eucalipto" value="Eucalipto"> Miele d'eucalipto
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="centrato">
                        Capienza: <input class="caselle" type="number" name="Capienza" value="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="centrato">
                        <input class="caselle" style="margin-bottom: 20px" type="submit" value="Filtra">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    if(count($mieli)>0){
        echo '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
        $pippy = "";
        $sql = "SELECT barattolo.Codice_barattolo, miele.Nome, barattolo.Capienza, barattolo.Data_confezionamento, barattolo.Data_immagazzinamento, apicoltore.Cognome  , magazzino.Codice_magazzino, barattolo.Prezzo
                FROM barattolo JOIN miele ON barattolo.Nome_miele=miele.Nome
                            JOIN apicoltore ON apicoltore.Codice_apicoltore=barattolo.Codice_apicoltore
                            JOIN magazzino ON magazzino.Codice_magazzino=barattolo.Codice_magazzino
                WHERE barattolo.Nome_miele IN (";
        for ($i = 0; $i < count($mieli); $i++) {
            $pippy = $pippy . "\"" . $mieli[$i] . "\"";
            if ($i < count($mieli) - 1) {
                $pippy = $pippy . ",";
            }
        }
        if ($Capienza == "NULL")  $sql = $sql . $pippy .   ") AND barattolo.Codice_cliente IS NULL ";
        else $sql = $sql . $pippy .   ") AND barattolo.Capienza= " . $Capienza . " AND barattolo.Codice_cliente IS NULL ";
        // echo "<p>" . $_POST["Capienza"] . "</p>";
        // echo "<p>$Capienza</p>";
        // echo "<p>$sql</p>";
        $ris = $conn->query($sql) or die("<p>Query fallita!-$conn->error</p>");

        if ($ris->num_rows > 0) {
            echo "<p>Scegli tra i barattoli trovati secondo le tue preferenze.</p>";
            echo "<table class='ape'>";
            echo "<tr>  <th>Codice del barattolo</th> <th>Tipo di miele</th> <th>Capienza del barattolo</th> <th>Data di confezionamento</th> <th>Data di immagazzinamento</th> <th>Apicoltore</th> <th>Codice magazzino</th> <th>Prezzo del barattolo</th></tr>";

            foreach ($ris as $riga) {
                $Codice_barattolo = $riga["Codice_barattolo"];
                $MieleNome = $riga["Nome"];
                $Capienza = $riga["Capienza"];
                $Data_confezionamento = $riga["Data_confezionamento"];
                $Data_immagazzinamento = $riga["Data_immagazzinamento"];
                $ApicoltoreCognome = $riga["Cognome"];
                $Codice_magazzino = $riga["Codice_magazzino"];
                $Prezzo = $riga["Prezzo"];
                echo "
                    <tr>
                        <td><input type='checkbox' name='Codice_barattolo[]' value='$Codice_barattolo'/>$Codice_barattolo</td>
                        <td>$MieleNome</td>
                        <td>$Capienza</td>
                        <td>$Data_confezionamento</td>
                        <td>$Data_immagazzinamento</td>
                        <td>$ApicoltoreCognome</td>
                        <td>$Codice_magazzino</td>
                        <td>$Prezzo</td>
                    </tr>";
            }
            echo "</table>";
        }

        echo '<p><input  class="caselle" style="margin-bottom:30px;" type="submit" value="Aggiungi al carrello"></p>';
        echo '</form>'; 
    }
    ?>
        <!-- </div>
        <video autoplay muted loop id="video-back">
            <source src="../immagini/Api, l'impollinazione - bees pollination Macro 1080p 60 fps Nikon 1 J2.mp4" type="video/mp4">
        </video>
    </div> -->

    </div>

    <!-- manca tutta la aprte di aggiunta del cliente  -->
    <?php
    include('footer.php');
    $conn->close();
    ?>
</body>

</html>