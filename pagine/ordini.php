<?php
session_start();

if (isset($_SESSION["E_mail"])) $E_mail = $_SESSION["E_mail"];
else $E_mail = "";
if (isset($_SESSION["Numero_telefono"])) $Numero_telefono = $_SESSION["Numero_telefono"];
else $Numero_telefono = "";
if (isset($_SESSION["Password"])) $Password = $_SESSION["Password"];
else $Password = "";
if (isset($_SESSION["Codice_Cliente"])) $Codice_Cliente = $_SESSION["Codice_Cliente"];
else $Codice_Cliente = "";

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
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>Ecco qui il suo carrello:</h1>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <?php
        $Codice_Cliente = $_SESSION["Codice_cliente"];
        $sql = "  SELECT barattolo.Codice_barattolo, barattolo.Codice_apicoltore, barattolo.Prezzo, barattolo.Nome_miele, Barattolo.Capienza
                FROM barattolo
                WHERE barattolo.Codice_cliente= $Codice_cliente ";
        $ris = $conn->query($sql) or die("<p> query Fallita</p>");

        if ($ris->num_rows > 0) {
            echo "<p>Ecco tutti gli ordini</p>";
            echo "<table id='tabella_selezione_libri'>";
            echo "<tr> <th>Codice Barattolo</th> <th>Codice Apicoltore</th> <th>Prezzo</th> <th> Tipo di miele </th> <th> Capienza</th> <th></th> </tr>";
            foreach ($ris as $riga) {
                $Codice_Barattolo = $riga["Codice_Barattolo"];
                $Codice_apicoltore = $riga["Codice_apicoltore"];
                $Prezzo = $riga["Prezzo"];
                $Nome_miele = $riga["Nome_miele"];
                $Capienza = $riga["Capienza"];

                echo "
                    <tr>
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




    <?php
    include('footer.php');
    ?>
</body>
<?php
$conn->close();
?>

</html>