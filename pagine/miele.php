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

<body class="footer_scuro">
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
            <p class="reveal2"> Il tiglio si caratterizza per donare un nettare intriso di un aroma del tutto particolare, che risalta all'interno dei mieli anche quando la percentuale di tiglio è davvero piuttosto bassa.

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
            <p class="reveal2">Le proprietà peculiari di questo miele sono sicuramente quelle diuretiche, depurative e drenanti. È per questo che molto spesso viene inserito all’interno di diete purificanti o utilizzato per cure che mirano all’eliminazione delle tossine dal nostro organismo. Buon depurativo per tutto il nostro corpo, viene indicato particolarmente per la depurazione dei reni. Importante, così come per tutte le tipologie di miele, è consumarlo grezzo, non sottoposto a lavorazioni che lo privano delle sue preziose qualità. È quindi preferibile scegliere un miele prodotto localmente, magari dall’apicoltore vicino a casa, in modo tale da essere sicuri della sua genuinità e origine. </p>
        </div>
    </div>


    <div class="Erba_medica group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/erba.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI ERBA MEDICA</h2>
            <p class="reveal2">L’erba medica (Medicago sativa, della famiglia delle leguminose), è una delle piante piu’ antiche della famiglia delle leguminose. Si ritiene che  sia originaria delle regioni dell’Asia occidentale, quali la Media (donde il nome) e la Persia, caratterizzate da un clima continentale con primavere tardive ed estati molto calde e brevi. Con i nomadi delle steppe migrò verso la Cina, il Nord Africa e l’Europa. Venne introdotta in Grecia dai persiani nel 492-490 a.C. In Italia giunse tra il 200 ed il 150 a.C.  Nel Nord Italia Italia viene chiamata anche “erba Spagna”, poiché è dalla Spagna che la leguminosa venne reintrodotta nel XV secolo. Il suo nome arabo, “alfa-alfa”, significa invece “padre di tutti i cibi”.</p>
            <p class="reveal2">L’erba medica e’ stata impiegata per anni come alimento per gli animali erbivori, recentemente si è cominciato a utilizzarla anche come alimento umano: si possono ricavarne pane, frittelle e the e viene venduta sotto forma di germogli, di semi, di compresse, e foglie per preparare il the. Sembra accertato che la ricchezza dei suoi valori nutritivi risieda nel fatto che le sue radici scavano profondamente il terreno, alla ricerca dei minerali sepolti sotto la radice del suolo. cartina_it_erba_medicaLe sue radici sono lunghe in media dai 3 ai 6 metri. </p>
            <p class="reveal2">E’ una pianta perenne, cresce facilmente in ogni tipo di terreno, e quasi sotto ogni clima, ma sono condizioni calde ed umide che garantiscono i migliori raccolti di miele. Poichè raramente si realizzano, le produzioni di miele di erba medica sono di anno in anno oscillanti. Caratteristico è il meccanismo di “scatto”  con cui il fiore su apre, per permettere l’impollinazione incrociata, al contatto con le api, “schiaffeggiandole” o imprigionandole: un meccanismo che dopo alcune esperienze le api imparano a evitare operando di lato e in velocità. Fiorisce da maggio a settembre, ma rende solo quando viene fatta fiorire completamente per la produzione del seme.</p>
            <p class="reveal2">Cristallizza spontaneamente a pochi mesi dal raccolto, il colore è da ambra a ambra chiaro nel miele liquido, da beige chiaro a nocciola quando cristallizzato. L’odore e l’aroma sono di media intensità, così la persistenza. E’ un miele con una notevole acidità.</p>
        </div>
    </div>

    <div class="Eucalipto group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/eucalipto.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI EUCALIPTO</h2>
            <p class="reveal2">Il miele di eucalipto è uno dei mieli migliori che produciamo in Italia ed è usato per le sue proprietà salutari verso i malesseri dell'apparato respiratorio. Scopriamo le caratteristiche, le proprietà e gli usi.</p>
            <p class="reveal2">La consistenza di questo miele è compatta e il colore è ambrato che vira verso il grigio con consistenza ancora più compatta.La sua cristallizzazione avviene in pochi mesi e la granulometria è assai fine. Il sapore è forte, intenso e particolarmente balsamico: per alcuni ricorda i funghi, il legno e il curry, mentre altri vi sentono il sapore dell'elicriso e delle caramelle alla liquerizia.Il gusto comunque non è troppo dolce e anche l’acidità è moderata.</p>
            <p class="reveal2">
Miele di eucalipto, proprietà e usi in cucina
Andiamo a conoscere le caratteristiche del miele di eucalipto, le proprietà benefiche per il nostro organismo e come utilizzarlo
di MIRA TONIONIMiele di eucalipto, proprietà e usi in cucinaIl miele di eucalipto è uno dei mieli migliori che produciamo in Italia ed è usato per le sue proprietà salutari verso i malesseri dell'apparato respiratorio. Scopriamo le caratteristiche, le proprietà e gli usi. </p>
            <p class="reveal2">Caratteristiche del miele di eucaliptoLa consistenza di questo miele è compatta e il colore è ambrato che vira verso il grigio con consistenza ancora più compatta.La sua cristallizzazione avviene in pochi mesi e la granulometria è assai fine. Il sapore è forte, intenso e particolarmente balsamico: per alcuni ricorda i funghi, il legno e il curry, mentre altri vi sentono il sapore dell'elicriso e delle caramelle alla liquerizia.Il gusto comunque non è troppo dolce e anche l’acidità è moderata. Proprietà e benefici del miele di eucaliptoIl miele di eucalipto viene utilizzato principalmente contro la tosse e le malattie tipiche dell'apparato respiratorio come il raffreddore, oltre che in generale per i malesseri dovuti a stati di infiammazione. Queste sue proprietà non sono ancora state accertate a livello scientifico anche se per quanto riguarda l'olio essenziale di eucalipto ci sono già risultati anche di studi che dimostrano la sua efficacia contro diversi batteri e virus.Il miele di eucalipto contiene molte sostanze antiossidanti e in particolare i flavonoidi che concorrono a mantenere il benessere del corpo perché riducono i radicali liberi che sono responsabili dell’invecchiamento cellulare.Il miele di eucalipto diviene così un alimento da poter assumere come prevenzione alle malattie degenerative e nel caso di fenomeni infiammatori tanto che ricerche che mettono a confronto diversi tipi di miele hanno dichiarato il miele di eucalipto come miglior antiossidante e antinvecchiamento.</p>
        </div>
    </div>

    <div class="Girasole group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/girasole.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI GIRASOLE</h2>
            <p class="reveal2">Il miele di girasole biologico ha un profumo di fieno, di frutta dolce ed esotica. Il sapore è simile all’odore, leggermente erbaceo, con una sensazione “rinfrescante”, fruttato, di albicocche mature, con retrogusto di anice stellato. E’ dorato come il colore che il sole dipinge sui petali del fiore da cui nasce e la sua cristallizzazione è molto fine. Tra le proprietà del miele di girasole, la medicina popolare lo ricorda come antinevralgico e febbrifugo. Ricco di polline, può essere utilizzato come ricostituente naturale. Gli vengono inoltre attribuite proprietà in grado di abbassare il livello di colesterolo e come ricalcificante delle ossa.</p>
            <p class="reveal2">Per la sua dolcezza, dovuta all’alta concentrazione di glucosio, e al suo sapore leggero e delicato, il miele di girasole è particolarmente indicato per preparare dolci e biscotti, o come dolcificante in tè e tisane.</p>
            <p class="reveal2">Il miele di girasole viene acquistato da apicoltori specializzati del centro Italia con cui I Frutti del Sole spesso effettua scambi di miele monoflora provenienti da contesti territoriali differenti. I Frutti del Sole valorizza al meglio tutti i mieli italiani perché non esiste un solo “miele”, ma tanti “mieli” quanti sono i fiori dei diversi territori. La smielatura dei favi viene condotta con metodi tradizionali e rispettosi dei processi biologici delle api.</p>
        </div>
    </div>

    <div class="Millefiori group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/millefiori.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI MILLEFIORI</h2>
            <p class="reveal2">Il miele millefiori è uno dei più comuni e più diffusi e sa conquistare tutti con il suo sapore delicato. Mai uguale a sé stesso, ogni vasetto è un estratto del territorio e della stagione in cui è stato prodotto dalle api. Se qualcuno ti ha detto che è un prodotto di serie B rispetto ai più raffinati e ben identificabili monoflora, fatti una bella risata!</p>
            <p class="reveal2">Il miele millefiori ha una grande ricchezza aromatica: è frutto dell’estro creativo della natura. È una tavolozza di tonalità e gradazioni straordinarie che possono regalare sensazioni ogni volta nuove e inattese. È ricco di nutrienti ed è un super alleato per combattere i mali di stagione. Inoltre, nutre capelli e pelle.</p>
            <p class="reveal2">Il miele millefiori è un prodotto unico nel suo genere, che può avere origine in varie zone: collinari, montuose e pianeggianti. Unisce in sé le proprietà di svariate piante: profumo e sapore possono avere note diverse, che cambiano a seconda della zona di produzione. Al palato la sua scala aromatica è estremamente ampia e peculiare e può riservare sorprendenti aromi, mai uguali tra loro.</p>
        </div>
    </div>

    <div class="Rododendro group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/rododendro.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI RODODENDRO</h2>
            <p class="reveal2">Il miele di rododendro del parco Adamello Brenta è uno dei mieli più rari e pregiati che si possano trovare in Italia. Viene raccolto dalle api che nella buona stagione sono portate in alta montagna da apicoltori nomadi per la fioritura di questo magnifico fiore alpino che sboccia nei mesi estivi a elevate altitudini, anche 2000 metri. Questa pianta offre abbondante nettare e polline alle api, che ne producono un miele molto ricercato.</p>
            <p class="reveal2">Il nome deriva dal greco “rhòdon” (rosa) e déndron (albero), per il caratteristico colore rosa di molte sue specie (altre possono essere bianche o gialle). E’ una pianta arbustiva (Rhododendron L. della famiglia delle ericacee) che cresce in terreni soleggiati, ad altezze tra gli 800 e i 1300 metri.</p>
            <p class="reveal2">Il miele di rododendro si presenta allo stato liquido da incolore a giallo paglierino chiaro, cristallizzato da bianco a beige chiaro.
L’odore è molto debole, etereo. Il sapore normalmente dolce, fine, poco persistente.</p>
            <p class="reveal2">Un rododendro in purezza monofloreale è piuttosto raro e i mieli definiti abitualmente di rododendro presentano un aroma più intenso rispetto a quello descritto, dovuto alla presenza di altre specie. Sono comuni mieli di rododendro con un aroma floreale/fruttato dovuto al lampone o con odore pungente dovuto al timo.</p>
            <p class="reveal2">Solo recentemente il rododendro è diventato una produzione abbastanza comune,  perché solo in tempi recenti si sono resi disponibili mezzi e strade con cui sostenere una non facile transumanza, soprattutto nelle quote più alte. Il miele di Rododendro viene prodotto in Italia in tutte le regioni dell’arco alpino: Valle d’Aosta, Piemonte, Lombardia, Trentino-Alto Adige e in minor misura Friuli-Venezia Giulia.</p>
        </div>
    </div>

    <div class="Timo group">
        <div class="container__Miele__img zoom pipi">
            <img src="../immagini/timo.png" alt="">
        </div>
        <div class="container__Miele__text">
            <h2 class="big-text reveal azzurro">MIELE DI TIMO</h2>
            <p class="reveal2">La pianta del timo ha ottime proprietà balsamiche ed espettoranti che calmano la tosse e aiutano la guarigione delle malattie tipiche invernali.I suoi principali principi attivi sono gli oli essenziali, ottimi antisettici che combattono le malattie infettive nei diversi apparati corporei; l’azione antisettica raggiunge infatti molti distretti: a livello intestinale, nelle vie urinarie e persino in tutto l’apparato respiratorio il miele di timo aiuta a disinfettare, purificare e placare gli attacchi virali.</p>
            <p class="reveal2">Gli oli essenziali presenti inoltre migliorano il nostro sistema immunitario e quindi stimolano la guarigione e fortificano il fisico combattendo la stanchezza.L'attività balsamica ed espettorante del miele di timo quindi aiuta a lenire le infiammazioni nelle vie respiratorie e facilita la fuoriuscita del muco. Ottimo per calmare la tosse ed evitare l’irritazione della mucosa che spesso è provocata dai colpi repentini della tosse stizzosa.Il miele di timo può essere utilizzato per le flatulenze e i gas intestinali oltre ad essere un eccellente vermifugo.</p>
            <p class="reveal2">Il gusto del miele di timo è molto simile a quello di eucalipto forse perché condivide l’aromaticità degli oli essenziali che restano all’interno del miele stesso e gli donano un sapore particolarmente intenso.Gli assaggiatori gli conferiscono le caratteristiche di un profumo forte, speziato, che ricorda il legno aromatico, il vin brulé e i chiodi di garofano.</p>
            <p class="reveal2">La sua dolcezza è media con sapore aromatico che resta persistente nella bocca e che termina con un retrogusto balsamico.Il suo colore è ambrato con una tendenza a diventare bruno e solitamente con il tempo e l'abbassamento della temperatura il miele solidifica; nel caso del miele di timo cristallizza in una grana fine a consistenza molto compatta, processo che avviene comunque abbastanza lentamente a causa del fruttosio.</p>
            <p class="reveal2">In cucina il miele è sempre meglio utilizzarlo senza nessun tipo di riscaldamento o cottura per non perderne le proprietà salutari.Viene solitamente aggiunto alle tisane e alle bevande calde appena sono arrivate a temperatura adeguata per essere sorseggiate. Un cucchiaio a tazza è sufficiente per donare i sui benefici.</p>
            <p class="reveal2">È un miele cristallizzato, famoso anche per essere un alimento calmante e rilassante. Per il suo gusto intenso e persistente è ideale da abbinare a formaggi stagionati e saporiti, come il provolone, e vini rossi. In inverno è un ottimo coadiuvante dei raffreddori e degli stati influenzali, specie se sciolto in tè e latte. In estate, se aggiunto a bevande analcoliche fresche, è rinfrescante.</p>
            <p class="reveal2">Il miele di timo, grazie alla presenza di timolo, ha molteplici benefici sull’organismo: è digestivo, depurativo, balsamico e antibatterico. È utile anche in presenza di infezioni del cavo orale e particolarmente efficace contro l’alito cattivo.</p>
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