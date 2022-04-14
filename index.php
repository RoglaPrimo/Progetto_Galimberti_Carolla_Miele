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
            <p>l territorio corrispondente all'odierno Turkmenistan è stato abitato fin dall'antichità dalle tribù dei Turkmeni, probabilmente provenienti dai Monti Altai. I primi insediamenti umani nell'area sono databili tra il 7.000 e il 5.000 a.C. In italiano antico era nota come Turcomannia, ovvero la terra dei Turcomanni.</p>
            <p>Il territorio fu in seguito conquistato da numerose diverse civilizzazioni. I persiani achemenidi conquistarono il territorio nel VI secolo a.C., Alessandro Magno occupò il Turkmenistan nel IV secolo a.C. Dopo circa 150 anni il controllo macedone finì e nella regione nacque nel 247 a.C. l'Impero partico, la cui capitale fu stabilita a Nisa, a 25 km dalla moderna capitale Aşgabat.</p>
            <p>La via della seta passava per Merv, capitale dell'antico Turkmenistan (detto Margiana ai tempi dei Romani)</p>
            <p>Durante questo periodo il Turkmenistan assunse importanza come tappa della via della seta, la principale via per gli scambi commerciali tra Asia ed Europa.</p>
            <p>L'Impero partico cadde tra il 224 e il 228, seguito dalla dominazione dei Sasanidi (III secolo) e successivamente degli Eftaliti (V secolo), quando il cristianesimo divenne la religione predominante.</p>
        </div>
        <video autoplay muted loop id="video-back">
            <source src="immagini/Api, l'impollinazione - bees pollination Macro 1080p 60 fps Nikon 1 J2.mp4" type="video/mp4">
        </video>
    </div>




    <?php
        include('pagine/footer.php');
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