<?php
    session_start();

    if(isset($_SESSION["Codice_utente"])) $Codice_utente = $_SESSION["Codice_utente"];  else header('location: login.php');
    if(isset($_SESSION["Numero_telefono"])) $Numero_telefono = $_SESSION["Numero_telefono"];  else $Numero_telefono = "";
    // if(isset($_SESSION["Password"])) $Password = $_SESSION["Password"];  header('location: login.php');

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";

    if( $_SESSION["tipologia"]!="apicoltore"){
	    header('location: logout.php');
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazzino</title>
    <link rel="stylesheet" href="../style.css">

</head>

<body>
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

        $sql1= "SELECT magazzino.Codice_magazzino, magazzino.Città
                FROM magazzino";

        $ris1 = $conn->query($sql1) or die("<p>Query fallita!-$conn->error</p>");

        echo "<p> Ecco elencati di seguito i prodotti che hai venduto e che sono ancora presenti nei nostri magazzini: </p>";

        while($riga = $ris1->fetch_assoc())
        {
            $Codice_magazzino = $riga["Codice_magazzino"];
            $Città=$riga["Città"];

            $sql2="SELECT barattolo.Codice_barattolo, barattolo.Capienza, barattolo.Nome_miele, barattolo.Data_confezionamento, barattolo.Data_immagazzinamento
                FROM barattolo
                WHERE barattolo.Codice_apicoltore= $Codice_utente AND barattolo.Codice_magazzino=$Codice_magazzino";
        
            $ris2 = $conn->query($sql2) or die("<p>Query fallita!-$conn->error</p>");

            // echo "
            //     <table>
            //         <tr> <th></th> <th>Codice del magazzino</th> <th>Comune</th></tr>
            //         <tr>
            //                 <td>$Codice_magazzino</td>
            //                 <td>$Città</td>
            //         </tr>
            //     ";

            if($ris2->num_rows == 0)
            {
                echo "
                <table>
                    <tr> <th></th> <th>Codice del magazzino</th> <th>Comune</th></tr>
                    <tr>
                            <td>$Codice_magazzino</td>
                            <td>$Città</td>
                    </tr>
                    <tr><td></td><td></td><td><p>Nessuno dei tuoi barattoli è ancora all'interno del magazzino</p></td></tr>
                ";
            } 
            
            else{
                echo "
                <table>
                    <tr> <th></th> <th>Codice del magazzino</th> <th>Comune</th></tr>
                    <tr>
                            <td>$Codice_magazzino</td>
                            <td>$Città</td>
                    </tr>
                ";
                echo "<tr> <th></th> <th>Codice del barattolo</th> <th>Capienza del barattolo</th> <th>Tipo di miele</th> <th>Data di confezionamento</th> <th>Data di immagazzinamento</th></tr>";

                while($pippo = $ris2->fetch_assoc())
                {
                    $Codice_barattolo=$pippo["Codice_barattolo"];
                    $Capienza=$pippo["Capienza"];
                    $Nome_miele=$pippo["Nome_miele"];
                    $Data_confezionamento=$pippo["Data_confezionamento"];
                    $Data_immagazinamento=$pippo["Data_immagazzinamento"];

                    echo "
                        <tr>
                            <td>$Codice_barattolo</td>
                            <td>$Capienza</td>
                            <td>$Nome_miele</td>
                            <td>$Data_confezionamento</td>
                            <td>$Data_immagazinamento</td>
                        </tr>
                    ";
                };
            }
            echo "</table>";
        };
    ?>

</body>
</html>