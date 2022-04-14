<?php
    session_start();

    if (isset($_SESSION["tipologia"])) $tipologia = $_SESSION["tipologia"]; else $tipologia = "";

    $db_servername = "localhost";
    $db_name = "miele";
    $db_username = "root";
    $db_password = "";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I nostri prodotti</title>

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
            <?php
                if($tipologia=="cliente")
                {
                    echo"
                        <ul class="header__menu">
                            <li><a href="miele.php">I nostri prodotti</a></li>
                            <li><a href="negozio.php">Negozio</a></li>
                            <li class="header__img">
                                <a href="../home_cliente.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
                            </li>
                            <li><a href="ordini.php">Il tuo carrello</a></li>
                            <li><a href="logout.php">Logout</a> </li>
                        </ul>
                    ";
                }
                if($tipologia=="apicoltore")
                {
                    echo "
                        <ul class="header__menu">
                            <li><a href="miele.php">I nostri prodotti</a></li>
                            <li><a href="magazzino.php">Magazzino</a></li>
                            <li class="header__img">
                                <a href="../home_apicoltore.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
                            </li>
                            <li><a href="vendite.php">Le tue vendite</a></li>
                            <li><a href="logout.php">Logout</a> </li>
                        </ul>
                    ";
                }
                if($tipologia=="")
                {
                    echo "
                        <ul class="header__menu">
                            <li><a href="index.php">Chi siamo</a></li>
                            <li><a href="miele.php">I nostri prodotti</a></li>
                            <li class="header__img">
                                <a href="../index.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
                            </li>
                            <li><a href="registrazione.php">Registrati</a></li>
                            <li><a href="login.php">Login</a> </li>
                        </ul>
                    ";
                }
            ?>
    </div>

    <div class="introduzione__miele">
        <h1>I PIU' RAFFINATI MIELI AL MONDO</h1>
        <p>Qui di seguito puoi vedere l'intera gamma di prodotti che il nostro negozio ti mette a disposizione. Si tratta di prodotti unici nel loro genere, dieci tipologie diverse di altissima qualità che incarnano alla perfezione l'essenza della natura e che potrai trovare solamente qui da noi.</p>
    </div>

    <div class="Acacia group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Acacia-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE D'ACACIA</h2>
            <p class="reveal3">Il miele di acacia si ricava dalla Robinia pseudoacacia, anche nota semplicemente come Robinia, una pianta molto diffusa in Piemonte, Lombardia, Veneto e Toscana. Può innalzarsi fino a 25 metri in altezza ed è facilmente riconoscibile grazie ai tipici fiori bianchi o color crema, che presentano la classica conformazione a grappolo. Essi sono caratterizzati soprattutto dal profumo, molto dolce e gradevole.

                La robinia è originaria del nord America, ed  essendo un esemplare che cresce velocemente e che si adatta bene a diverse condizioni ambientali, in molte zone può mettere a rischio la sopravvivenza e la diffusione delle piante autoctone. Nonostante ciò, è ritenuta molto utile sia come fonte di legname sia per scopi ornamentali, ma anche come fonte nettarifera .</p>
            <p class="reveal3">Il miele di acacia è molto conosciuto e apprezzato per le sue caratteristiche, che lo rendono appetibile anche a coloro che non mal sopportano i sapori più forti e particolari. Le sue particolarità iniziano già dal colore. Il miele di acacia è tanto più chiaro e incolore quanto più è puro, ovvero prodotto principalmente a partire dal nettare dell’acacia. Al contrario, se le api bottinatrici raccolgono contemporaneamente anche il nettare di altri fiori, il colore di questo miele può scurirsi fino a raggiungere tonalità giallo paglierino.

                Non presenta né un odore né un sapore particolarmente forti o marcati, anzi, la loro assenza è un tratto caratteristico di questo miele. Per questo motivo è molto amato dai bambini e viene preferito rispetto ad altri tipi di miele come dolcificante e come ingrediente in ricette di vario genere. Utilizzando il miele di acacia non si rischia infatti di alterare il gusto degli altri cibi o bevande.
                
                miele di acaciaUn altro degli aspetti che rendono il miele di acacia tanto amato è il fatto che tende a non cristallizzare. Rimane quindi liquido a lungo e anche a basse temperature. Questo è possibile perché, a differenza di altre tipologie di miele, presenta una maggior concentrazione di fruttosio rispetto al glucosio.</p>
          
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Castagno-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal3">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal3">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal3">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal3">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Castagno.jpg" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal3">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal3">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal3">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal3">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Acacia group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="immagini/Acacia.jpg" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE D'ACACIA</h2>
            <p class="reveal3">Il miele di acacia si ricava dalla Robinia pseudoacacia, anche nota semplicemente come Robinia, una pianta molto diffusa in Piemonte, Lombardia, Veneto e Toscana. Può innalzarsi fino a 25 metri in altezza ed è facilmente riconoscibile grazie ai tipici fiori bianchi o color crema, che presentano la classica conformazione a grappolo. Essi sono caratterizzati soprattutto dal profumo, molto dolce e gradevole.

                La robinia è originaria del nord America, ed  essendo un esemplare che cresce velocemente e che si adatta bene a diverse condizioni ambientali, in molte zone può mettere a rischio la sopravvivenza e la diffusione delle piante autoctone. Nonostante ciò, è ritenuta molto utile sia come fonte di legname sia per scopi ornamentali, ma anche come fonte nettarifera .</p>
            <p class="reveal3">Il miele di acacia è molto conosciuto e apprezzato per le sue caratteristiche, che lo rendono appetibile anche a coloro che non mal sopportano i sapori più forti e particolari. Le sue particolarità iniziano già dal colore. Il miele di acacia è tanto più chiaro e incolore quanto più è puro, ovvero prodotto principalmente a partire dal nettare dell’acacia. Al contrario, se le api bottinatrici raccolgono contemporaneamente anche il nettare di altri fiori, il colore di questo miele può scurirsi fino a raggiungere tonalità giallo paglierino.

                Non presenta né un odore né un sapore particolarmente forti o marcati, anzi, la loro assenza è un tratto caratteristico di questo miele. Per questo motivo è molto amato dai bambini e viene preferito rispetto ad altri tipi di miele come dolcificante e come ingrediente in ricette di vario genere. Utilizzando il miele di acacia non si rischia infatti di alterare il gusto degli altri cibi o bevande.
                
                miele di acaciaUn altro degli aspetti che rendono il miele di acacia tanto amato è il fatto che tende a non cristallizzare. Rimane quindi liquido a lungo e anche a basse temperature. Questo è possibile perché, a differenza di altre tipologie di miele, presenta una maggior concentrazione di fruttosio rispetto al glucosio.</p>
          
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Castagno.jpg" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal3">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal3">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal3">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal3">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Castagno.jpg" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal3">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal3">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal3">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal3">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Acacia group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Acacia.jpg" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE D'ACACIA</h2>
            <p class="reveal3">Il miele di acacia si ricava dalla Robinia pseudoacacia, anche nota semplicemente come Robinia, una pianta molto diffusa in Piemonte, Lombardia, Veneto e Toscana. Può innalzarsi fino a 25 metri in altezza ed è facilmente riconoscibile grazie ai tipici fiori bianchi o color crema, che presentano la classica conformazione a grappolo. Essi sono caratterizzati soprattutto dal profumo, molto dolce e gradevole.

                La robinia è originaria del nord America, ed  essendo un esemplare che cresce velocemente e che si adatta bene a diverse condizioni ambientali, in molte zone può mettere a rischio la sopravvivenza e la diffusione delle piante autoctone. Nonostante ciò, è ritenuta molto utile sia come fonte di legname sia per scopi ornamentali, ma anche come fonte nettarifera .</p>
            <p class="reveal3">Il miele di acacia è molto conosciuto e apprezzato per le sue caratteristiche, che lo rendono appetibile anche a coloro che non mal sopportano i sapori più forti e particolari. Le sue particolarità iniziano già dal colore. Il miele di acacia è tanto più chiaro e incolore quanto più è puro, ovvero prodotto principalmente a partire dal nettare dell’acacia. Al contrario, se le api bottinatrici raccolgono contemporaneamente anche il nettare di altri fiori, il colore di questo miele può scurirsi fino a raggiungere tonalità giallo paglierino.

                Non presenta né un odore né un sapore particolarmente forti o marcati, anzi, la loro assenza è un tratto caratteristico di questo miele. Per questo motivo è molto amato dai bambini e viene preferito rispetto ad altri tipi di miele come dolcificante e come ingrediente in ricette di vario genere. Utilizzando il miele di acacia non si rischia infatti di alterare il gusto degli altri cibi o bevande.
                
                miele di acaciaUn altro degli aspetti che rendono il miele di acacia tanto amato è il fatto che tende a non cristallizzare. Rimane quindi liquido a lungo e anche a basse temperature. Questo è possibile perché, a differenza di altre tipologie di miele, presenta una maggior concentrazione di fruttosio rispetto al glucosio.</p>
          
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Castagno.jpg" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal3">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal3">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal3">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal3">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Castagno.jpg" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal3">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal3">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal3">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal3">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img reveal3 pipi">
            <img src="../immagini/Castagno.jpg" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal3">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal3">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal3">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal3">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <?php
        include('footer.php');
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