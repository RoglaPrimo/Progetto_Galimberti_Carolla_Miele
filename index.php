<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    
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
            <!-- <li><a id="colore" href="index.php">Chi siamo</a></li> -->
            <li class="header__img">
                <a href="index.php"><img src="immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
            </li>
            <li><a id="colore" href="pagine/miele.php">I nostri prodotti</a></li>
            <li><a id="colore" href="pagine/registrazione.php">Registrati</a></li>
            <li><a id="colore" href="pagine/login.php">Login</a> </li>
        </ul>
    </div>

    <div class="container__Intro">
        <div class="container__Intro__text reveal">
            <h2>IL NOSTRO NEGOZIO</h2>
            <p>Il nostro negozio Nasce da una passione comune per questo meraviglioso prodotto che è il miele. Non esiste rimedio naturale più versatile: volgia di dolce? Bevi del miele</p>
            <p>Hai un po' di mal di gola? un cucchiaino di latte e del miele  e tutto sarà a posto in un batter d'occhio. Non ci credi? Vieni a provare tutte e dieci varietà di miele che offriamo. </p>
            <p>Tutti i barattoli sono prodotti da apicoltori da noi selezioniamo con cura, per darti la migliore qualità possibile. Biologici e non trattati, i nostri mieli soddisferanno ogni tua voglia, concedendoti quell'attimo di intensa soddisfazione ognuno di noi ha bisogno  di provare almeno una volta al giorno </p>
            <p>Vieni a scoprire tutti i nostri prodotti!. Ci troviamo a Cambiago, proprio a ridosso della piazza del paese.</p>
        </div>
        <video autoplay muted loop id="video-back">
            <source src="immagini/Api, l'impollinazione - bees pollination Macro 1080p 60 fps Nikon 1 J2.mp4" type="video/mp4">
        </video>
    </div>

    


    <?php 
    echo '<div class="footer reveal">';
    echo '<em>"Negozio online di miele"</em>, società di apicoltura Galimberti-Carolla di Vimercate';
    echo '<div class="Mattavelli">
        <ul class="header__menu" id="id">
            <li>
                <div class="riduci">
                    <p style="float: left;">Seguici sui nostri social: </p>
                </div>
                <div class="riduci">
                    <img src="immagini/download-removebg-preview.png" alt="Mia Immagine">
                </div>
                <div class="riduci">
                    <img src="immagini/Facebook-removebg-preview.png" alt="Mia Immagine">
                </div>
                <div class="riduci">
                    <img src="immagini/Twitter-removebg-preview.png" alt="Mia Immagine">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js"
        integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA=="
        crossorigin="anonymous"></script>

    <script>
        ScrollReveal().reveal('.reveal', { distance: '100px', duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 600 });
        ScrollReveal().reveal('.reveal2', { distance: '100px', duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)',origin:'left', interval: 600 });
        ScrollReveal().reveal('.reveal3', { distance: '100px', duration: 2000, easing: 'cubic-bezier(.215, .61, .355, 1)',origin:'right', interval: 600 });
        ScrollReveal().reveal('.zoom', { duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 200, scale: 0.65, mobile: false });
    </script>
</body>

</html>