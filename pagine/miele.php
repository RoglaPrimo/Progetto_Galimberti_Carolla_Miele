<?php
session_start();

if (isset($_SESSION["tipologia"])) $tipologia = $_SESSION["tipologia"];
else $tipologia = "";

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />

    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css" integrity="sha512-ztsAq/T5Mif7onFaDEa5wsi2yyDn5ygdVwSSQ4iok5BPJQGYz1CoXWZSA7OgwGWrxrSrbF0K85PD5uLpimu4eQ==" crossorigin="anonymous" />

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <?php
        if ($tipologia == "cliente") {
            echo '
                        <ul class="header__menu">
                            <li><a id="active" href="miele.php">I nostri prodotti</a></li>
                            <li><a id="black" href="negozio.php">Negozio</a></li>
                            <li class="header__img">
                                <a href="home_cliente.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
                            </li>
                            <li><a id="black" href="ordini.php">Il tuo carrello</a></li>
                            <li><a id="black" href="logout.php">Logout</a> </li>
                        </ul>
                   ';
        }

        if ($tipologia == "apicoltore") {
            echo '
                        <ul class="header__menu">
                            <li><a id="active" href="miele.php">I nostri prodotti</a></li>
                            <li><a id="black" href="magazzino.php">Magazzino</a></li>
                            <li class="header__img">
                                <a href="home_apicoltore.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
                            </li>
                            <li><a id="black" href="vendite.php">Le tue vendite</a></li>
                            <li><a id="black" href="logout.php">Logout</a> </li>
                        </ul>
                      ';
        }

        if ($tipologia == "") {
            echo '
                        <ul class="header__menu">
                            <li class="header__img">
                                <a href="../index.php"><img src="../immagini/logo-removebg-preview.png" alt="Problemi nella visualizzazione del logo"></a>
                            </li>
                            <li><a id="active" href="miele.php">I nostri prodotti</a></li>
                            <li><a id="black" href="registrazione.php">Registrati</a></li>
                            <li><a id="black" href="login.php">Login</a> </li>
                        </ul>
                    ';
        }
        ?>
    </div>


    <div class="introduzione__miele">
        <h1>I PIU' RAFFINATI MIELI AL MONDO</h1>
        <p>Qui di seguito puoi vedere l'intera gamma di prodotti che il nostro negozio ti mette a disposizione. Si tratta di prodotti unici nel loro genere, dieci tipologie diverse di altissima qualità che incarnano alla perfezione l'essenza della natura e che potrai trovare solamente qui da noi.</p>
    </div>

    <div class="Acacia group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/Acacia-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE D'ACACIA</h2>
            <p class="reveal2">Il miele di acacia si ricava dalla Robinia pseudoacacia, anche nota semplicemente come Robinia, una pianta molto diffusa in Piemonte, Lombardia, Veneto e Toscana. Può innalzarsi fino a 25 metri in altezza ed è facilmente riconoscibile grazie ai tipici fiori bianchi o color crema, che presentano la classica conformazione a grappolo. Essi sono caratterizzati soprattutto dal profumo, molto dolce e gradevole.

                La robinia è originaria del nord America, ed essendo un esemplare che cresce velocemente e che si adatta bene a diverse condizioni ambientali, in molte zone può mettere a rischio la sopravvivenza e la diffusione delle piante autoctone. Nonostante ciò, è ritenuta molto utile sia come fonte di legname sia per scopi ornamentali, ma anche come fonte nettarifera .</p>
            <p class="reveal2">Il miele di acacia è molto conosciuto e apprezzato per le sue caratteristiche, che lo rendono appetibile anche a coloro che non mal sopportano i sapori più forti e particolari. Le sue particolarità iniziano già dal colore. Il miele di acacia è tanto più chiaro e incolore quanto più è puro, ovvero prodotto principalmente a partire dal nettare dell’acacia. Al contrario, se le api bottinatrici raccolgono contemporaneamente anche il nettare di altri fiori, il colore di questo miele può scurirsi fino a raggiungere tonalità giallo paglierino.

                Non presenta né un odore né un sapore particolarmente forti o marcati, anzi, la loro assenza è un tratto caratteristico di questo miele. Per questo motivo è molto amato dai bambini e viene preferito rispetto ad altri tipi di miele come dolcificante e come ingrediente in ricette di vario genere. Utilizzando il miele di acacia non si rischia infatti di alterare il gusto degli altri cibi o bevande.

                miele di acaciaUn altro degli aspetti che rendono il miele di acacia tanto amato è il fatto che tende a non cristallizzare. Rimane quindi liquido a lungo e anche a basse temperature. Questo è possibile perché, a differenza di altre tipologie di miele, presenta una maggior concentrazione di fruttosio rispetto al glucosio.</p>

        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/Castagno-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal2">Il miele di castagno è un’ottima fonte di proteine, vitamine B e C e di sali minerali, quali manganese, potassio, calcio e in particolare ferro. Come tutti i mieli, anche quello di castagno è molto calorico, 100 grammi apportano 300 calorie e quindi si consiglia di consumarlo in modeste quantità. Questo miele possiede proprietà anti-infiammatorie e anti-batteriche superiori a quelle dei mieli dal colore e sapore più delicato. Inoltre, come dimostrato da un gruppo di ricercatori in Spagna, ha una forte attività antimicrobica contro i batteri Staffilococco aureo ed Escherichia coli, e può agire anche in casi di Helicobacter pylori e Candida albicans. Per questo stesso motivo, è anche indicato nel trattamento di ulcere, aiutando a prevenire infezioni e velocizzandone la guarigione. Molti altri studi hanno anche dimostrato che, paragonato con altri mieli, il miele di castagno ha una capacità antiossidante estremamente elevata e contiene livelli molto alti di acido fenolico. </p>
            <p class="reveal2">Il miele di Castagno è un prodotto tipico delle zone mediterranee, soprattutto Italia, Francia, Grecia e Svizzera, dove nelle regioni montuose temperate tra i 300 e i 1200 metri si trovano boschi interi di castagni.Questo miele si ottiene dai colorati fiori di castagno e viene raccolto tra i mesi di giugno e ottobre. A differenza di molti altri mieli, quello di castagno ha un colore che varia dal giallo-marrone a quasi nero, dalle sfumature ambrate molto scure e intense; il suo odore è aromatico e legnoso e il sapore complesso, decisamente distinto, è molto meno dolce, con un retrogusto amarognolo che può essere apprezzato anche su piatti salati di carni e formaggi stagionati, mentre non si presta molto a sostituire lo zucchero per dolcificare tisane o te. </p>

        </div>
    </div>

    <div class="Tiglio group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/immagine_2022-04-16_074004806-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI TIGLIO</h2>
            <p class="reveal2">La produzione di questa particolare tipologia di miele si caratterizza per diffondersi su tutta la catena montuosa delle Alpi.
                Il miele di tiglio, infatti, è estremamente diffuso sull'intero arco alpino e si può considerare alla stregua di una produzione piuttosto limitata, ma che rappresenta un importante fattore economico per le realtà locali in cui viene raccolto e prodotto.

                Anche la Cina è un paese in cui è notevolmente diffusa la produzione di miele di tiglio, ma ovviamente si tratta di un alimento che viene realizzato solamente partendo da alcune specie di tiglio asiatiche.

                In particolar modo, è il Piemonte la regione in cui viene prodotto maggiormente questo tipo di miele.

                I mieli di tiglio che risultano maggiormente puri sono quelli che arrivano direttamente dall'Ossola o dalle vallate intorno a Novara.</p>
            <p> tiglio si caratterizza per donare un nettare intriso di un aroma del tutto particolare, che risalta all'interno dei mieli anche quando la percentuale di tiglio è davvero piuttosto bassa.

In special modo, il miele di tiglio ha anche delle particolari proprietà che lo rendono spesso impiegabile per diversi scopi terapeutici.

Ad esempio, l'assunzione del miele di tiglio può essere importante per l'organismo umano, dal momento che questo alimento può vantare delle notevoli proprietà calmanti, senza dimenticare il fatto che sia in grado di svolgere attività antispasmodiche, epatoprotettrici e anche calmanti nei confronti di svariati disturbi del sonno.

Al miele di tiglio si possono associare delle notevoli virtù calmanti ed antismasmotiche: ecco spiegato il motivo per cui ne viene consigliato l'utilizzo sopratutto in tutte quelle situazioni in cui si ha la necessità di curare stati nervosi o insonnia.
s
</p>
        </div>
    </div>

    <div class="Tarassaco group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/immagine_2022-04-16_080726645-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI TARASSACO</h2>
            <p class="reveal2">Il tarassaco è una pianta erbacea perenne che cresce spontaneamente in zone pianeggianti e montuose, fino ai 2000 metri di altezza. Le foglie hanno proprietà depurative e stimolano l’attività epatica, mentre la radice è usata come diuretico e, tostata, come surrogato del caffè. Il fiore sboccia proprio all’inizio del periodo primaverile. Questo rende particolarmente difficile la produzione di un miele di tarassaco mono-floreale. L’apicoltore, infatti, per ottenerlo deve avere delle api che hanno svernato bene, forti e quindi pronte alla raccolta appena appaiono i primi fiori. Se così non fosse, il nettare raccolto da questa prima fioritura verrebbe inevitabilmente mischiato ai raccolti successivi.</p>
            <p class="reveal2">Il miele di tarassaco presenta il tipico colore giallo vivo. Solo se mischiato al miele di salice, per esempio, assume una colorazione più tendente al beige. Ha una cristallizzazione particolarmente veloce e molto spesso si verifica con cristalli piuttosto fini. Questo non rende molto consigliabile una sua prolungata permanenza nei maturatori, da cui poi potrebbe risultare complicato l’invasettamento. Inoltre, presenta un contenuto di acqua piuttosto elevato, attorno al 18-20%. Se non corretto dall’apicoltore, questo può ridurre notevolmente i tempi di conservazione del miele stesso a causa di una probabile fermentazione.

Una particolarità che permette di riconoscere immediatamente questo miele è il suo odore molto forte, pungente, penetrante, molto spesso descritto come ammoniacale. A ciò, tuttavia, corrisponde un sapore che ricorda l’infuso di camomilla o, addirittura, il gusto delle caramelle a base di oli essenziali.</p>
            <p>Le proprietà peculiari di questo miele sono sicuramente quelle diuretiche, depurative e drenanti. È per questo che molto spesso viene inserito all’interno di diete purificanti o utilizzato per cure che mirano all’eliminazione delle tossine dal nostro organismo. Buon depurativo per tutto il nostro corpo, viene indicato particolarmente per la depurazione dei reni. Importante, così come per tutte le tipologie di miele, è consumarlo grezzo, non sottoposto a lavorazioni che lo privano delle sue preziose qualità. È quindi preferibile scegliere un miele prodotto localmente, magari dall’apicoltore vicino a casa, in modo tale da essere sicuri della sua genuinità e origine. </p>
        </div>
    </div>


    <div class="Castagno group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/Castagno-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal2">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal2">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal2">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal2">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/Castagno-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal2">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal2">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal2">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal2">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/Castagno-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal2">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal2">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal2">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal2">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/Castagno-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal2">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal2">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal2">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal2">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/Castagno-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal2">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal2">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal2">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal2">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>

    <div class="Castagno group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/Castagno-removebg-preview.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI CASTAGNO</h2>
            <p class="reveal2">Come la Ciclamino, anche la Maglia Azzurra viene indossata dal leader di una classifica basata a punti, ovvero la classifica dei GPM (acronimo di Gran Premio della Montagna).</p>
            <p class="reveal2">La maglia viene indossata in gara dal corridore che alla fine della tappa precedente possiede il monte punti, relativo a questa classifica, più alto. Questa particolare classifica può essere vinta da qualsiasi tipo di corridore (ad eccezione ovviamento dei velocisti che con la salita non hanno un buon rapporto!).</p>
            <p class="reveal2">Come si ottengono i punti per la Maglia Azzurra? Essi possono essere raccolti allo scollinamento di qualsiasi salita relativamente lunga. I punti vengono assegnati in base alla posizione ottenuta in cima (chi transita per primo raccoglie più punti) e soprattutto in base alla difficoltà della salita. Proprio per questo, i GPM sono suddivisi in quattro categorie, dalla quarta (per le salite più semplici) alla prima (per quelle più dure). Vi è poi, in tutta l'edizione, una salita di prima categoria d'eccezione, diversa da tutte le altre e che fornisce più punti. Si tratta della Cima Coppi, chiamata così in onore del "Campionissimo" Fausto Coppi. Essa rappresenta il punto più alto in altitudine toccato dalla corsa durante l'intera edizione e varia di anno in anno a seconda del percorso e del profilo altimetrico scelto dagli organizzatori di gara. Quest'anno la Cima Coppi sarà rappresentata dal Passo Pordoi ad una quota di 2239 metri sul livello del mare, Pordoi che vanta il numero di presenze come salita (40) e come Cima Coppi (13) nella storia del Giro. Cima Coppi per antonomasia è però il Passo dello Stelvio che, con i suoi 2758 metri di quota, rappresenta il punto più alto mai toccato dal Giro d'Italia.</p>
            <p class="reveal2">Nella tabella seguente sono riportati i punti assegnati ai corridori in funzione alla categoria del GPM e alla posizione ottenuta dal corridore in corrispondenza di esso.</p>
        </div>
    </div>


    <?php
    include('footer.php');
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
</body>

</html>