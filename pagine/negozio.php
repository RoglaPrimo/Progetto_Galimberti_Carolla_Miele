<?php
    session_start();

    if(isset($_POST["Acacia"])) $Acacia = $_POST["Acacia"];  else $Acacia = "";
    if(isset($_POST["Castagno"])) $Castagno = $_POST["Castagno"];  else $Castagno = "";
    if(isset($_POST["Tiglio"])) $Tiglio = $_POST["Tiglio"];  else $Tiglio = "";
    if(isset($_POST["Tarassaco"])) $Tarassaco = $_POST["Tarassaco"];  else $Tarassaco = "";
    if(isset($_POST["Rododendro"])) $Rododendro = $_POST["Rododendro"];  else $Rododendro = "";
    if(isset($_POST["Millefiori"])) $Millefiori = $_POST["Millefiori"];  else $Millefiori = "";
    if(isset($_POST["Timo"])) $Timo = $_POST["Timo"];  else $Timo = "";
    if(isset($_POST["Girasole"])) $Girasole = $_POST["Girasole"];  else $Girasole = "";
    if(isset($_POST["Erba_medica"])) $Erba_medica = $_POST["Erba_medica"];  else $Erba_medica = "";
    if(isset($_POST["Eucalipto"])) $Eucalipto = $_POST["Eucalipto"];  else $Eucalipto = "";
    if(isset($_POST["Capienza"])) $Capienza = $_POST["Capienza"];  else $Capienza = "";

    if(isset($_SESSION["Codice_cliente"])) $Codice_cliente = $_SESSION["Codice_cliente"];  else $Codice_cliente = "";

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";

    // if(!isset($_SESSION['E_mail'])){
	// 	header('location: ../index.php');
	// }
	if( $_SESSION["tipologia"]!="cliente"){
	    header('location: logout.php');
	}

    // $E_mail = $_SESSION["E_mail"];
    // $Codice_cliente= $_SESSION["Codice_cliente"];
	//echo $username;

	$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['Codice_barattolo'])){
			$bellissimo = $_POST['Codice_barattolo'];
		} else {
			$bellissimo = array();
		}
		// $libri = isset($_POST['cod_libri']) ? $_POST['cod_libri'] : array(); // è un if else
		foreach($bellissimo as $Caruccio) {
  			//echo $libro . '<br/>';
  			$sql = "UPDATE barattolo
  					SET Codice_cliente = '$Codice_cliente'
  					WHERE Codice_barattolo = '$Caruccio'";
			$conn->query($sql) or die("<p>Query fallita!</p>");
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
            <li><a id="active" href="negozio.php">Negozio</a></li>
            <li class="header__img">
                <a href="home_cliente.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
            </li>
            <li><a id="black" href="ordini.php">Il tuo carrello</a></li>
            <li><a id="black" href="logout.php">Logout</a> </li>
        </ul>
    </div>

    <div class="container__Intro__text reveal" id="backwhite">
    <h1>SCEGLI IL MIELE CHE TI INTERESSA E LA CAPIENZA DEL BARATTOLO</h1>
    <p>Ecco tutti i nostri mieli:</p>

    <form action="negozio.php" method="post">

        <table>
            <tr>
                <td>
                    <input type="checkbox" name="Acacia" value="Acacia" checked> Miele d'acacia
                    <input type="checkbox" name="Castagno" value="Castagno"> Miele di castagno
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="Tiglio" value="Tiglio"> Miele di tiglio
                    <input type="checkbox" name="Tarassaco" value="Tarassaco"> Miele di tarassaco
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="Rododendro" value="Rododendro"> Miele di rododendro
                    <input type="checkbox" name="Millefiori" value="Millefiori"> Miele millefiori
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="Timo" value="Timo"> Miele di timo
                    <input type="checkbox" name="Girasole" value="Girasole"> Miele di girasole
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="Erba_medica" value="Erba_medica"> Miele di erba medica
                    <input type="checkbox" name="Eucalipto" value="Eucalipto"> Miele d'eucalipto
                </td>
            </tr>
            <tr>
                <td>
                    Capienza: <input type="int" name="Capienza" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Filtra"/>
                </td>
            </tr>
        </table>
    </form>

    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <?php

    $mieli = array();

    if(!empty($Acacia)) array_push($mieli, $Acacia);
    if(!empty($Castagno)) array_push($mieli, $Castagno);
    if(!empty($Tiglio)) array_push($mieli, $Tiglio);
    if(!empty($Tarassaco)) array_push($mieli, $Tarassaco);
    if(!empty($Rododendro)) array_push($mieli, $Rododendro);
    if(!empty($Millefiori)) array_push($mieli, $Millefiori);
    if(!empty($Timo)) array_push($mieli, $Timo);
    if(!empty($Girasole)) array_push($mieli, $Girasole);
    if(!empty($Erba_medica)) array_push($mieli, $Erba_medica);
    if(!empty($Eucalipto)) array_push($mieli, $Eucalipto);
    
        $sql = "SELECT barattolo.Codice_barattolo, miele.Nome, barattolo.Capienza, barattolo.Data_confezionamento, barattolo.Data_immagazzinamento, apicoltore.Nome, magazzino.Codice_magazzino, barattolo.Prezzo
                FROM barattolo JOIN miele ON barattolo.Nome_miele=miele.Nome
                            JOIN apicoltore ON apicoltore.Codice_apicoltore=barattolo.Codice_apicoltore
                            JOIN magazzino ON magazzino.Codice_magazzino=barattolo.Codice_magazzino
                WHERE barattolo.Nome_miele IN ("; 
                
                foreach($mieli as $miele){
                    $sql = $sql."'$miele', ";
                }
                
                $sql = $sql.") AND barattolo.Capienza= " .$Capienza. " AND barattolo.Codice_cliente= NULL ";
                // individuato l'errore: non gli va bene quel Null che viene dato, non gli piace per nulla

        $ris = $conn->query($sql) or die("<p>Query fallita!-$conn->error</p>");

        if ($ris->num_rows > 0) {
            echo "<p>Scegli tra i barattoli trovati secondo le tue preferenze.</p>";
            echo "<table>";
            echo "<tr> <th></th> <th>Codice del barattolo</th> <th>Tipo di miele</th> <th>Capienza del barattolo</th> <th>Data di confezionamento</th> <th>Data di immagazzinamento</th> <th>Apicoltore</th> <th>Codice magazzino</th> <th>Prezzo del barattolo</th></tr>";
        
            foreach($ris as $riga){
                // if ($riga["E_mail"]){
                //     $preso = "disabled";
                //     $disponibile = "No";
                // }
                // else {
                //     $preso = "";
                //     $disponibile = "Sì"; 
                // }
                $Codice_barattolo = $riga["barattolo.Codice_barattolo"];
                $MieleNome = $riga["miele.Nome"];
                $Capienza = $riga["barattolo.Capienza"];
                $Data_confezionamento = $riga["baratttolo.Data_confezionamento"];
                $Data_immagazzinamento = $riga["baratttolo.Data_immagazzinamento"];
                $ApicoltoreNome = $riga["apicoltore.Nome"];
                $Codice_magazzino = $riga["magazzino.Codice_magazzino"];
                
                echo "
                    <tr>
                        <td><input type='checkbox' name='Codice_barattolo[]' value='$Codice_barattolo'/></td>
                        <td>$Codice_barattolo</td>
                        <td>$MieleNome</td>
                        <td>$Capienza</td>
                        <td>$Data_confezionamento</td>
                        <td>$Data_immagazzinamento</td>
                        <td>$ApicoltoreNome</td>
                        <td>$Codice_magazzino</td>
                    </tr>";
            }
            echo "</table>";
        }
    ?>
    <p><input type="submit" value="Aggiungi al carrello"></p>
    </form>

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