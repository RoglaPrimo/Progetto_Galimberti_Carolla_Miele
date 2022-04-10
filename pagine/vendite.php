<?php
    session_start();

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";

    if( $_SESSION["tipologia"]!="cliente"){
	    header('location: logout.php');
	}

    $E_mail = $_SESSION["E_mail"];
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

    <php
    $Miele=$_POST["Miele"]
    $Capienza=$_POST["Capienza"]

    $sql=" SELECT miele.Prezzo
        From Miele
        WHERE Miele.nome = barattolo.Capienza= $Miele
        ";

    $ris = $conn->query($sql2) or die("<p>Query fallita!</p>")-$conn->error;

    $prezzo=($ris)*($Capienza);

    $sql2=" "UPDATE barattolo
  					SET barattolo.prezzo = $prezzo
  					WHERE cod_libro = '$libro'"; 
    
    echo "<p> Al termine della transazione verrai paggato $prezzo$<p>"
    echo "<p> Ora selezione un magazzino libero a cui consegnare il tuo prodotto<p>"
    <form action="vendite.php" method="post">
            <table>
               <tr>
                $sql3 =" SELECT Magazzino.nome
                From magazzino
                Having count()
                 ";
                $ris = $conn->query($sql3) or die("<p>Query fallita!</p>")-$conn->error;
                
                 foreach($ris as $riga) {
                    <td> $riga["NomeMagazzino"] </td>
                    <td> $riga["Indizrizzo"]</td>
                    <td> <input type="radio" name="Magazzino" value=" $riga["NomeMagazzino"]  " required> </td>

                   }
               </tr>
            </table>
            <p><input type="submit" value="Accedi"></p>
        </form>
       <?php
        $Magazzinoscelto=$_POST["Magazzino"];
       
       $sql3 =" UPDATE magazzino
        SET magazzino
        

       ?>

    ?>
</body>
</html>