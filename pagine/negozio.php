<?php
    session_start();

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";

    if(!isset($_SESSION['E_mail'])){
		header('location: ../index.php');
	}
	if( $_SESSION["tipologia"]!="cliente"){
	    header('location: logout.php');
	}

    $E_mail = $_SESSION["E_mail"];
	//echo $username;

	$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['Codice_barattolo'])){
			$Codice_barattolo = $_POST['Codice_barattolo'];
		} else {
			$bellissimo = array();
		}
		// $libri = isset($_POST['cod_libri']) ? $_POST['cod_libri'] : array(); // è un if else
		foreach($Codice_barattolo as $Codice_barattolo) {
  			//echo $libro . '<br/>';
  			$sql = "UPDATE barattolo
  					SET Codice_cliente = '$Codice_cliente'
  					WHERE Codice_barattolo = '$Codice_barattolo'";
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
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    <div>
    <h1>SCEGLI IL MIELE CHE TI INTERESSA</h1>
    <p>Ecco tutti i nostri mieli:</p>

    <form action="negozio.php" method="post">
        <table>
            <tr>
                <td>
                    <input type="radio" name="Acacia" value="Acacia"> Miele d'acacia
                    <input type="radio" name="Castagno" value="Castagno"> Miele di castagno
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="Tiglio" value="Tiglio"> Miele di tiglio
                    <input type="radio" name="Tarassaco" value="Tarassaco"> Miele di tarassaco
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="Rododendro" value="Rododendro"> Miele di rododendro
                    <input type="radio" name="Millefiori" value="Millefiori"> Miele millefiori
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="Timo" value="Timo"> Miele di timo
                    <input type="radio" name="Girasole" value="Girasole"> Miele di girasole
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="Erba_medica" value="Erba_medica"> Miele di erba medica
                    <input type="radio" name="Eucalipto" value="Eucalipto"> Miele d'eucalipto
                </td>
            </tr>
            <tr>
                <td>
                    <p>Data di confezionamento: </p>
                </td>
                <td>
                    Capienza: <input type="int" name="Capienza" value="Capienza" required>
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
        $Acacia = "";
        $Castagno = "";
        $Tiglio = "";
        $Tarassaco = "";
        $Rododendro = "";
        $Millefiori = "";
        $Timo = "";
        $Girasole = "";
        $Erba_medica = "";
        $Eucalipto = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST" and (isset($_POST["Acacia"]) or isset($_POST["Castagno"]) or isset($_POST["Tiglio"]) or isset($_POST["Tarassaco"]) or isset($_POST["Rododendro"]) or isset($_POST["Millefiori"]) or isset($_POST["Timo"]) or isset($_POST["Girasole"]) or isset($_POST["Erba_medica"]) or isset($_POST["Eucalipto"]))) {
            $Acacia = $_POST["Acacia"];
            $Castagno = $_POST["Castagno"];
            $Tiglio = $_POST["Tiglio"];
            $Tarassaco = $_POST["Tarassaco"];
            $Rododendro = $_POST["Rododendro"];
            $Millefiori = $_POST["Millefiori"];
            $Timo = $_POST["Timo"];
            $Girasole = $_POST["Girasole"];
            $Erba_medica = $_POST["Erba_medica"];
            $Eucalipto = $_POST["Eucalipto"];
        };

        $sql = "SELECT barattolo.Codice_barattolo, miele.Nome, barattolo.Capienza, baratttolo.Data_confezionamento, barattolo.Data_immagazzinamento, apicoltore.Nome, magazzino.Codice_magazzino
                FROM barattolo JOIN miele ON barattolo.Nome_miele=miele.Nome
                            JOIN apicoltore ON apicoltore.Codice_apicoltore=barattolo.Codice_apicoltore
                            JOIN magazzino ON magazzino.Codice_magazzino=barattolo.Codice_magazzino
                WHERE barattolo.Nome_miele IN ($Acacia, $Castagno, $Tiglio, $Tarassaco, $Rododendro, $Millefiori, $Timo, $Girasole, $Erba_medica, $Eucalipto) AND barattolo.Capienza=Capienza AND barattolo.Codice_cliente=NULL";

        $ris = $conn->query($sql) or die("<p>Query fallita!</p>");

        if ($ris->num_rows > 0) {
            echo "<p>Scegli tra i barattoli trovati secondo le tue preferenze.</p>";
            echo "<table>";
            echo "<tr> <th></th> <th>Codice del barattolo</th> <th>Tipo di miele</th> <th>Capienza del barattolo</th> <th>Data di confezionamento</th> <th>Data di immagazzinamento</th> <th>Apicoltore</th> <th>Codice magazzino</th></tr>";
        
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
                        <td><input type='checkbox' name='Codice_barattolo[]' value='$bellissimo'/></td>
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
    <p<input type="submit" value="Acquista"/></p>
    </form>
    </div>
    <?php 
		include('footer.php');
	$conn->close();
	?>
</body>
</html>