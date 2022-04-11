<?php
    session_start();

    if(isset($_POST["Capienza"])) $Capienza = $_POST["Capienza"];  else $Capienza = "";
    if(isset($_SESSION["Numero_telefono"])) $Numero_telefono = $_SESSION["Numero_telefono"];  else $Numero_telefono = "";
    if(isset($_POST["Codice_magazzino"])) $Codice_magazzino = $_POST["Codice_magazzino"];  else $Codice_magazzino = "";
    if(isset($_POST["Codice_apicoltore"])) $Codice_apicoltore = $_POST["Codice_apicoltore"];  else $Codice_apicoltore = "";
    if(isset($_POST["Miele"])) $Miele = $_POST["Miele"];  else $Miele = "";
    if(isset($_POST["Data_confezionamento"])) $Data_confezionamento = $_POST["Data_confezionamento"];  else $Data_confezionamento = "";
    // if(isset($_POST["Prezzo"])) $Prezzo = $_POST["Prezzo"];  else $Prezzo = "";

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";

    if( $_SESSION["tipologia"]!="apicoltore"){
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
                    <td>Tipo di miele: </td> <td><input type="text" name="Miele" value="Acacia"></td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>Capienza del barattolo: </td> <td><input type="radio" name="Capienza" value="250" checked>250 g</td> <td><input type="radio" name="Capienza" value="500">500 g</td> <td><input type="radio" name="Capienza" value="1000">1000 g</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                <td>Data di confezionamento: </td> <td><input type="date" name="Data_confezionamento" <?php echo "value = '$Data_confezionamento'" ?>></td>
                </tr>
                <tr>
                
                </tr>
            </table>
            <p><input type="submit" value="Invia"></p>
        </form>
    </div>

    <?php
        $Miele=$_POST["Miele"];
        $Capienza=$_POST["Capienza"];
        $_SESSION["Miele"]=$Miele;
        $_SESSION["Capienza"]=$Capienza;


        $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

        $sql="SELECT Prezzo
                FROM miele
                WHERE Nome = '$Miele'";

        $ris = $conn->query($sql) or die("<p>Query fallita!: " . $conn->connect_error . "</p>");
        $row = $ris->fetch_assoc();
        // echo $row['Prezzo'];
        $Prezzo=($row["Prezzo"])*floatval(($Capienza/1000));
        $_SESSION["Prezzo"]=$Prezzo;

        // $sql2="UPDATE barattolo
  	    // 			SET barattolo.Prezzo = '$prezzo'
  	    // 			WHERE cod_libro = '$libro'"; 
    
    
        echo "<p> Al termine della transazione verrai pagato $Prezzo,00 euro</p>";
        echo "<table>";
        echo "<p> Ora seleziona un magazzino libero in cui il tuo prodotto verrà depositato: </p>";
        echo "<tr> <th></th> <th>Codice del magazzino</th> <th>Comune</th> <th>Via</th> <th>Civico</th> </tr>";
    ?>

    <form action="vendite.php" method="post">
               <?php
                $sql2 =" SELECT magazzino.Codice_magazzino AS Codice_magazzino, magazzino.Città AS Città, magazzino.Via AS Via, magazzino.Civico AS Civico, COUNT(Codice_barattolo) AS Numero_barattoli, magazzino.Capienza AS Capienza
                            FROM magazzino JOIN barattolo ON barattolo.Codice_magazzino=Codice_magazzino
                            GROUP BY Codice_magazzino
                            HAVING Numero_barattoli < Capienza";
                
                $ris2 = $conn->query($sql2) or die("<p>Query fallita!-$conn->error</p>");
                
                 foreach($ris2 as $riga) {
                    $Codice_magazzino = $riga["magazzino.Codice_magazzino"];
                    $Città = $riga["magazzino.Città"];
                    $Via = $riga["magazzino.Via"];
                    $Civico = $riga["magazzino.Civico"];
                    $_SESSION["Codice_magazzino"]=$Codice_magazzino;
                    $_SESSION["Città"]=$Città;
                    $_SESSION["Via"]=$Via;
                    $_SESSION["Civico"]=$Civico;

                    echo "
                        <tr>
                            <td><input type='radio' name='Codice_magazzino' value=''/></td>
                            <td>$Codice_magazzino</td>
                            <td>$Città</td>
                            <td>$Via</td>
                            <td>$Civico</td>
                        </tr>
                    ";
                };
                echo "</table>";
                ?>
            <p><input type="submit" value="Aggiungi al deposito"></p>
        </form>

    <?php
        $Codice_magazzino=$_SESSION["Codice_magazzino"];
        $Città=$_SESSION["Città"];
        $Via=$_SESSION["Via"];
        $Civico=$_SESSION["Civico"];
        $Prezzo= $_SESSION["Prezzo"];
        $Miele= $_SESSION["Miele"];
        $sql3 = "SELECT apicoltore.Codice_apicoltore
                    FROM apicoltore
                    WHERE apicoltore.Numero_telefono ='$Numero_telefono'";

        $ris3 = $conn->query($sql3) or die("<p>Query fallita!</p>")-$conn->error;

        $sql4 = "INSERT INTO barattolo (Capienza, Codice_apicoltore, Codice_magazzino, Nome_miele, Data_confezionamento, Prezzo)
                    VALUES ('$Capienza', '$ris3', ' $Codice_magazzino', '$Miele', $Data_confezionamento',  '$Prezzo')";
    ?>
</body>
</html>