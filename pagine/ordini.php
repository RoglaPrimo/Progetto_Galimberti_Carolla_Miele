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

<body class="footer_scuro">

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
        
        $tot=array();
        $Prezzi=0;
            if(isset($_POST['cod_libri']))
            {
                $tot=$_POST['cod_libri'];
                foreach($tot as $p)
                {
                    $sql1 = "SELECT barattolo.Prezzo
                        FROM barattolo
                        WHERE barattolo.Codice_barattolo='$p'";
                    $ris1=$conn->query($sql1) or die("<p> query Fallita</p>");
                    $ris1=$ris1->fetch_assoc();
                    $Prezzi=$Prezzi+floatval($ris1["Prezzo"]);

                    $conn->query('SET FOREIGN_KEY_CHECKS=0;');
                    $sql2 = " DELETE FROM barattolo WHERE barattolo.Codice_barattolo='$p'";
                    $conn->query($sql2);
                    $conn->query('SET FOREIGN_KEY_CHECKS=1;');
                }
            }

        $sql = "  SELECT barattolo.Codice_barattolo, apicoltore.Cognome, barattolo.Prezzo, barattolo.Nome_miele, Barattolo.Capienza
                FROM barattolo JOIN apicoltore ON apicoltore.Codice_apicoltore=barattolo.Codice_apicoltore
                WHERE barattolo.Codice_cliente= '$Codice_cliente' ";
        $ris = $conn->query($sql) or die("<p> query Fallita</p>");

        if ($ris->num_rows > 0) {
            echo "<p id='cursive'>Ecco tutti i tuoi ordini: spunta quelli che vuoi acquistare</p>";
            echo "<table class='tabella_carrello'";
            echo "<tr> <th>Codice barattolo</th> <th>Tipo di miele</th> <th>Capienza</th> <th>Nome apicoltore</th> <th>Prezzo</th> <th></th> <th></th> </tr>";
            
            foreach ($ris as $riga) {
                $Codice_Barattolo = $riga["Codice_barattolo"];
                $Cognome = $riga["Cognome"];
                $Prezzo = $riga["Prezzo"];
                $Nome_miele = $riga["Nome_miele"];
                $Capienza = $riga["Capienza"];

                echo "
                    <tr>
                    <td>$Codice_Barattolo</td>
					<td>$Nome_miele</td>
					<td>$Capienza</td>
					<td>$Cognome</td>
                    <td>$Prezzo</td>
                    <td><input type='checkbox' name='cod_libri[]' value='$Codice_Barattolo' /></td>
                    <td><input type='checkbox' name='cod_libri1[]' value='$Codice_Barattolo' /></td>
                    </tr>
                ";
            }
            echo "</table>";
            echo '<p style="text-align: center; padding-bottom: 10px"><input class="caselle" id="accedi" type="submit" value="Conferma" /></p>';
            
        } else {
            echo "<p id='cursive' style='padding: 20px'>Al momento non è presente alcun prodotto nel suo carrello. Visita il <a class='hover' href='negozio.php'>nostro negozio</a></p>";
        }
        echo "<p id='cursive' style='padding-bottom: 20px'>Prezzo totale dell'ordine: $Prezzi euro</p>";
        
        ?>
    </form>
    </div>


    <?php
    include('footer.php');
    ?>
</body>
<?php
$conn->close();
?>

</html>