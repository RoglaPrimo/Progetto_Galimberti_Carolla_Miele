<?php 
    echo '<div class="footer reveal';
    // echo $_SERVER["PHP_SELF"];
    // if(basename($_SERVER["PHP_SELF"])=="miele.php")
    // {
    //     echo 'footer--dark';
    // }
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

  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js" integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA==" crossorigin="anonymous"></script>

<script>
    ScrollReveal().reveal('.reveal', {
        distance: '100px',
        duration: 1500,
        easing: 'cubic-bezier(.215, .61, .355, 1)',
        interval: 600
    });
    ScrollReveal().reveal('.reveal2', {
        distance: '100px',
        duration: 1500,
        easing: 'cubic-bezier(.215, .61, .355, 1)',
        origin: 'left',
        interval: 600
    });
    ScrollReveal().reveal('.reveal3', {
        distance: '100px',
        duration: 2000,
        easing: 'cubic-bezier(.215, .61, .355, 1)',
        origin: 'right',
        interval: 600
    });
    ScrollReveal().reveal('.zoom', {
        duration: 1500,
        easing: 'cubic-bezier(.215, .61, .355, 1)',
        interval: 200,
        scale: 0.65,
        mobile: false
    });
</script>