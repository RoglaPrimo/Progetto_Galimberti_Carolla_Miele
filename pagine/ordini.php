<?php
session_start();

if (isset($_SESSION["E_mail"])) $E_mail = $_SESSION["E_mail"]; else $E_mail = "";
if (isset($_SESSION["Numero_telefono"])) $Numero_telefono = $_SESSION["Numero_telefono"]; else $Numero_telefono = "";
if (isset($_SESSION["Password"])) $Password = $_SESSION["Password"]; else $Password = "";
if (isset($_SESSION["Codice_utente"])) $Codice_cliente = $_SESSION["Codice_utente"]; else $Codice_cliente = "";

$db_servername = "localhost";
$db_name = "miele";
$db_username = "root";
$db_password = "";

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
  					SET Codice_cliente = 'NULL'
  					WHERE Codice_barattolo = '$Caruccio'";
        $conn->query($sql) or die("<p>Query fallita!</p>");
    }
}
if ($_SESSION["tipologia"] != "cliente") {
    header('location: logout.php');
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo carrello</title>
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
            <li><a id="black" href="miele.php">I nostri prodotti</a></li>
            <li><a id="black" href="negozio.php">Negozio</a></li>
            <li class="header__img">
                <a href="home_cliente.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
            </li>
            <li><a id="active" href="ordini.php">Il tuo carrello</a></li>
            <li><a id="black" href="logout.php">Logout</a> </li>
        </ul>
    </div>

    <div class="container__Intro__text reveal" id="backwhite">
    <h1>Ecco qui il suo carrello:</h1>
   
            
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

        <?php
        
        $Codice_cliente = $_SESSION["Codice_utente"];
        $sql = "  SELECT barattolo.Codice_barattolo, barattolo.Codice_apicoltore, barattolo.Prezzo, barattolo.Nome_miele, Barattolo.Capienza
                FROM barattolo
                WHERE barattolo.Codice_cliente= '$Codice_cliente' ";
        $ris = $conn->query($sql) or die("<p> query Fallita</p>");

        if ($ris->num_rows > 0) {
            echo "<p>Ecco tutti gli ordini</p>";
            echo "<table id='tabella_selezione_libri'>";
            echo "<tr> <th>Codice Barattolo</th> <th>Codice Apicoltore</th> <th>Prezzo</th> <th> Tipo di miele </th> <th> Capienza</th> <th></th> </tr>";
            foreach ($ris as $riga) {
                $Codice_Barattolo = $riga["Codice_barattolo"];
                $Codice_apicoltore = $riga["Codice_apicoltore"];
                $Prezzo = $riga["Prezzo"];
                $Nome_miele = $riga["Nome_miele"];
                $Capienza = $riga["Capienza"];

                echo "
                    <tr>
                    <td>$Codice_Barattolo</td>
					<td>$Codice_apicoltore</td>
					<td>$Prezzo</td>
					<td>$Nome_miele</td>
                    <td>$Capienza</td>
                    <td><input type='checkbox' name='cod_libri[]' value='$Codice_Barattolo' /></td>


                    </tr>
                ";
            }
        } else {
        }
        echo "</table>"

        ?>
    </form>
    <p style="text-align: center; padding-top: 10px"><input type="submit" value="Conferma" /></p>
    </div>



    <?php
    include('footer.php');
    ?>
</body>
<?php
$conn->close();
?>

</html>