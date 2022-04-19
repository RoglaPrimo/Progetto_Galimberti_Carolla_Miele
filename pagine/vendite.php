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

</head>

<body>
    <div class="menu">
        <ul>
            <li><a href="informazioni.php">Chi siamo</a></li>
            <li><a href="miele.php">I nostri prodotti</a></li>
        </ul>
        <ul>
            <li><a href="magazzino.php">Magazzino</a></li>
            <li><a href="">Le tue vendite</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <h1>INSERISCI LE INFORMAZIONI DEL BARATTOLO CHE VUOI VENDERE:</h1>
    <div>
        <form action="vendite.php" method="post">
            <table>
                <tr>
                    <td colspan="2">Tipo di miele: </td>
                    <td colspan="2"><input type="text" name="Miele" value=""></td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>Capienza del barattolo: </td>
                                <td><input type="radio" name="Capienza" value="250" checked>250 g</td>
                                <td><input type="radio" name="Capienza" value="500">500 g</td>
                                <td><input type="radio" name="Capienza" value="1000">1000 g</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Data di confezionamento: </td>
                    <td colspan="2"><input type="date" name="Data_confezionamento" <?php echo "value = '$Data_confezionamento'" ?>></td>
                </tr>
                <tr>
                    <?php
                    echo "<table>";
                    echo "<p> Ora seleziona un magazzino libero in cui il tuo prodotto verrà depositato: </p>";
                    echo "<tr> <th></th> <th>Codice del magazzino</th> <th>Comune</th> <th>Via</th> <th>Civico</th> </tr>";
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
                            <td><input type='radio' name='Codice_magazzino' value='$Codice_magazzino'/></td>
                            <td>$Codice_magazzino</td>
                            <td>$Citta</td>
                            <td>$Via</td>
                            <td>$Civico</td>
                        </tr>
                    ";
                    };
                    echo "</table>";
                    ?>

                </tr>
            </table>
            <p><input type="submit" value="Invia"></p>
        </form>
    </div>

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
        echo $row['Prezzo'];
        $Prezzo = (floatval($row["Prezzo"])) * floatval((intval($Capienza) / 1000));
        $_SESSION["Prezzo"] = $Prezzo;

        // $sql2="UPDATE barattolo
        // 			SET barattolo.Prezzo = '$prezzo'
        // 			WHERE cod_libro = '$libro'"; 

        echo "<p> Al termine della transazione verrai pagato $Prezzo ,00 euro</p>";
    

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
    $Data_immagazzinamento = date("Y-m-d", time() );

    $sql4 = "INSERT INTO barattolo (Capienza, Codice_apicoltore, Codice_magazzino, Nome_miele, Data_confezionamento, Data_immagazzinamento, Prezzo)
                    VALUES ('$Capienza', '$Codice_apicoltore', ' $Codice_magazzino', '$Miele', '$Data_confezionamento', '$Data_immagazzinamento', '$Prezzo')";
    $conn->query('SET FOREIGN_KEY_CHECKS=0;');
    $ris3 = $conn->query($sql4) or die("<p>Query fallita!-$conn->error</p>");
    $conn->query('SET FOREIGN_KEY_CHECKS=1;');
    
    $conn->close();
    }
    ?>
    <?php
    include('footer.php');
    ?>
</body>

</html>