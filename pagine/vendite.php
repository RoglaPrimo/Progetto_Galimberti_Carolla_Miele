<?php
    session_start();

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";

    if( $_SESSION["tipologia"]!="cliente"){
	    header('location: logout.php');
	}

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

    <h1></h1>
    <div>
        <form action="vendite.php" method="post">
            <table>
                <tr>
                    <td>Tipo di miele: </td> <td><input type="text" name="Miele" value=""></td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>Capienza del barattolo: </td> <td><input type="radio" name="Capienza" value="250">250 g</td> <td><input type="radio" name="Capienza" value="500">500 g</td> <td><input type="radio" name="Capienza" value="1000">1000 g</td>
                            </tr>
                        </table>
                    </td>
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

        $sql="SELECT miele.Prezzo
                FROM miele
                WHERE miele.Nome = $Miele";

        $ris = $conn->query($sql) or die("<p>Query fallita!</p>")-$conn->error;

        $prezzo=($ris)*($Capienza/1000);
        $_SESSION["Prezzo"]=$Prezzo;

        // $sql2="UPDATE barattolo
  	    // 			SET barattolo.Prezzo = '$prezzo'
  	    // 			WHERE cod_libro = '$libro'"; 
    
    
        echo "<p> Al termine della transazione verrai pagato $prezzo</p>";
        echo "<table>";
        echo "<p> Ora seleziona un magazzino libero in cui il tuo prodotto verrà depositato: </p>";
        echo "<tr> <th></th> <th>Codice del magazzino</th> <th>Comune</th> <th>Via</th> <th>Civico</th> </tr>";
    ?>

    <form action="vendite.php" method="post">
               <?php
                $sql2 =" SELECT magazzino.Codice_magazzino, magazzino.Città, magazzino.Via, magazzino.Civico, COUNT (barattolo.Codice_barattolo) AS Numero_barattoli
                            FROM magazzino JOIN barattolo ON barattolo.Codice_magazzino=magazzino.Codice_magazzino
                            GROUP BY magazzino.Codice_magazzino
                            HAVING Numero_barattoli<magazzino.Capienza";
                
                $ris2 = $conn->query($sql2) or die("<p>Query fallita!</p>")-$conn->error;
                
                 foreach($ris as $riga) {
                    $Codice_magazzino = $riga["magazzino.Codice_magazzino"];
                    $Città = $riga["magazzino.Città"];
                    $Via = $riga["magazzino.Via"];
                    $Civico = $riga["magazzino.Civico"];
                    $_SESSION["Codice_magazzino"]=$Codice_magazzino;
                    $_SESSION["Città"]=$Codice_magazzino;
                    $_SESSION["Via"]=$Codice_magazzino;
                    $_SESSION["Civico"]=$Codice_magazzino;

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
        $sql3 = "SELECT apicoltore.Codice_apicoltore
                    FROM apicoltore
                    WHERE apicoltore.numerotelefono ='$_SESSION["Numero_Telefono"]'";

        $ris3 = $conn->query($sql3) or die("<p>Query fallita!</p>")-$conn->error;

        $sql4 = "INSERT INTO barattolo (Capienza, Codice_apicoltore, Codice_magazzino, Nome_miele, Data_confezionamento, Data_immagazzinamento, Prezzo)
                    VALUES ('$_SESSION["Capienza"]', '$ris3', ' $_SESSION["Codice_magazzino"]', '$_SESSION["Miele"]', $_session["Data_confezionamento"]', '$_SESSION["$Data_immagazzinamento"]', '$_SESSION["Prezzo"]')";
    ?>
</body>
</html>