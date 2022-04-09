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
                <tr>
                    <td>Prezzo barattolo: </td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>