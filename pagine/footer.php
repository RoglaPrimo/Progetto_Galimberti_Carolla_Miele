<?php 
    echo '<div class="footer ';
    // echo $_SERVER["PHP_SELF"];
    if(basename($_SERVER["PHP_SELF"])=="miele.php")
    {
        echo 'footer--dark';
    }
    echo '">';
    echo '<em>"Negozio online di miele"</em>, società di apicoltura Galimberti-Carolla di Vimercate';
    echo '<div class="Mattavelli">
        <ul class="header__menu" id="id">
            <li>
                <div class="riduci">
                    <p style="float: left;">Seguici sui nostri social: </p>
                </div>
                <div class="riduci">
                    <img src="../immagini/download-removebg-preview.png" alt="Mia Immagine">
                </div>
                <div class="riduci">
                    <img src="../immagini/Facebook-removebg-preview.png" alt="Mia Immagine">
                </div>
                <div class="riduci">
                    <img src="../immagini/Twitter-removebg-preview.png" alt="Mia Immagine">
                </div>
            </li>
            <li>
                <p>Email: galimberti.carolla.apicoltori@gmail.com</p>
            </li>
            <li>
                <p>Numero di telefono: 392 398 9485</p>
            </li>
        </ul>

        </div>';
    echo '</div>';

    
?>