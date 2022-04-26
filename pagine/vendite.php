<?php
session_start();

if (isset($_POST["Capienza"])) $Capienza = $_POST["Capienza"];
else $Capienza = 0;
if (isset($_SESSION["Numero_telefono"])) $Numero_telefono = $_SESSION["Numero_telefono"];
else $Numero_telefono = "";
if (isset($_POST["Codice_magazzino"])) $Codice_magazzino = $_POST["Codice_magazzino"];
else $Codice_magazzino = "";
if (isset($_SESSION["Codice_utente"])) $Codice_apicoltore = $_SESSION["Codice_utente"];
else $Codice_apicoltore = "";
if (isset($_POST["Miele"])) $Miele = $_POST["Miele"];
else $Miele = "";
if (isset($_POST["Data_confezionamento"])) $Data_confezionamento = $_POST["Data_confezionamento"];
else $Data_confezionamento = "";
// if(isset($_POST["Prezzo"])) $Prezzo = $_POST["Prezzo"];  else $Prezzo = "";

$db_servername = "localhost";
$db_name = "miele";
$db_username = "root";
$db_password = "";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($_SESSION["tipologia"] != "apicoltore") {
    header('location: logout.php');
}
// $Capienza=$_SESSION["Capienza"];
// $Numero_telefono= $_SESSION["Numero_telefono"];

// $E_mail = $_SESSION["E_mail"];
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le tue vendite</title>
    <link rel="stylesheet" href="../style.css">

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
            <li><a href="miele.php">I nostri prodotti</a></li>
            <li><a href="magazzino.php">Magazzino</a></li>
            <li class="header__img">
                <a href="home_cliente.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
            </li>
            <li><a id="active" href="vendite.php">Le tue vendite</a></li>
            <li><a href="logout.php">Logout</a> </li>
        </ul>
    </div>

    <div class="container__Intro">
    <div class="container__Intro__text reveal" id="backwhite2" style="background-color:palegreen; color:black;">
        <h1>INSERISCI LE INFORMAZIONI DEL BARATTOLO CHE VUOI VENDERE:</h1>
        <form action="vendite.php" method="post">
            <table class="tabella_input_2_colonne">
                <tr>
                    <td colspan="2">Tipo di miele: </td>
                    <td colspan="2"><input class="caselle" type="text" name="Miele" value=""></td>
                </tr>
                <tr>

                    <td>Capienza del barattolo: </td>
                    <td><input type="radio" name="Capienza" value="250" checked>250 g</td>
                    <td><input type="radio" name="Capienza" value="500">500 g</td>
                    <td><input type="radio" name="Capienza" value="1000">1000 g</td>

                </tr>
                <tr>
                    <td colspan="2">Data di confezionamento: </td>
                    <td colspan="2"><input class="caselle" type="date" name="Data_confezionamento" <?php echo "value = '$Data_confezionamento'" ?>></td>
                </tr>
                <tr>
                    <?php
                    echo "<table class='tabella_input_2_colonne'>";
                    echo "<p class='paddingaggiuntivo' id='cursive'> Ora seleziona un magazzino libero in cui il tuo prodotto verrà depositato: </p>";
                    echo "<tr>  <th style='text-align:center'>CODICE DEL MAGAZZINO</th> <th style='text-align:center'>COMUNE</th> <th style='text-align:center'>VIA</th> <th style='text-align:center'>CIVICO</th> </tr>";
                    $sql2 = " SELECT magazzino.Codice_magazzino, magazzino.Citta,  magazzino.Via, magazzino.Civico, COUNT(Codice_barattolo) AS Numero_barattoli, magazzino.Capienza
                            FROM magazzino JOIN barattolo ON barattolo.Codice_magazzino=magazzino.Codice_magazzino
                            GROUP BY magazzino.Codice_magazzino
                            HAVING Numero_barattoli < Capienza";

                    $ris2 = $conn->query($sql2) or die("<p>Query fallita!-$conn->error</p>");

                    foreach ($ris2 as $riga) {
                        $Codice_magazzino = $riga["Codice_magazzino"];
                        $Citta = $riga["Citta"];
                        $Via = $riga["Via"];
                        $Civico = $riga["Civico"];
                        $_SESSION["Codice_magazzino"] = $Codice_magazzino;
                        $_SESSION["Citta"] = $Citta;
                        $_SESSION["Via"] = $Via;
                        $_SESSION["Civico"] = $Civico;

                        echo "
                        <tr>
                            <td style='text-align:center'><input type='radio' name='Codice_magazzino' value='$Codice_magazzino'/> $Codice_magazzino</td>
                            <td style='text-align:center'>$Citta</td>
                            <td style='text-align:center'>$Via</td>
                            <td style='text-align:center'>$Civico</td>
                        </tr>
                    ";
                    };
                    echo "</table>";
                    ?>

                </tr>
            </table>
            <p><input class="caselle" id="accedi" type="submit" value="Vendi ora"></p>
            <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Miele = $_POST["Miele"];
        $Capienza = $_POST["Capienza"];
        $_SESSION["Miele"] = $Miele;
        $_SESSION["Capienza"] = $Capienza;

        $sql = "SELECT Prezzo
                FROM miele
                WHERE Nome = '$Miele'";

        $ris = $conn->query($sql) or die("<p>Query fallita!: " . $conn->connect_error . "</p>");
        $row = $ris->fetch_assoc();
        $Prezzo = (floatval($row["Prezzo"])) * floatval((intval($Capienza) / 1000));
        $_SESSION["Prezzo"] = $Prezzo;

        // $sql2="UPDATE barattolo
        // 			SET barattolo.Prezzo = '$prezzo'
        // 			WHERE cod_libro = '$libro'"; 

        echo "<p> Al termine della transazione verrai pagato $Prezzo euro</p>";


        $Codice_magazzino = $_SESSION["Codice_magazzino"];
        // $Citta=$_SESSION["Citta"];
        // $Via=$_SESSION["Via"];
        // $Civico=$_SESSION["Civico"];
        $Prezzo = $_SESSION["Prezzo"];
        $Miele = $_SESSION["Miele"];
        // $sql3 = "SELECT apicoltore.Codice_apicoltore
        //             FROM apicoltore
        //             WHERE apicoltore.Numero_telefono ='$Numero_telefono'";

        // $ris3 = $conn->query($sql3) or die("<p>Query fallita!</p>")-$conn->errore
        $Codice_apicoltore = $_SESSION["Codice_utente"];
        $Data_immagazzinamento = date("Y-m-d", time());

        $sql4 = "INSERT INTO barattolo (Capienza, Codice_apicoltore, Codice_magazzino, Nome_miele, Data_confezionamento, Data_immagazzinamento, Prezzo)
                    VALUES ('$Capienza', '$Codice_apicoltore', ' $Codice_magazzino', '$Miele', '$Data_confezionamento', '$Data_immagazzinamento', '$Prezzo')";
        $conn->query('SET FOREIGN_KEY_CHECKS=0;');
        $ris3 = $conn->query($sql4) or die("<p>Query fallita!-$conn->error</p>");
        $conn->query('SET FOREIGN_KEY_CHECKS=1;');

        $conn->close();
    }
    ?>
        </form>
    </div>
    </div>
    <video autoplay muted loop id="video-back">
        <source src="../immagini/Api, l'impollinazione - bees pollination Macro 1080p 60 fps Nikon 1 J2.mp4" type="video/mp4">
    </video>
    <!-- </div>
    </div>
    </div> -->

    
    <?php
    include('footer.php');
    ?>
</body>

</html>