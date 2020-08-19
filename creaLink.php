<?php
// includo la configurazione del database
require_once 'dbConfig.php';
// includo la libreria
require_once 'Shortener.class.php';
//inizializzo la classe Shortener e passo l'oggeto PDO
$shortener = new Shortener($db);

//URL originale da codificare
$longURL = $_GET['url'];

//prefisso del link da generare 
//$shortURL_Prefix = "https://".$_SERVER['SERVER_NAME']."/"; // with URL rewrite
$shortURL_Prefix = "https://"."linkio.it"."/"; // with URL rewrite
//$shortURL_Prefix = "https://".$_SERVER['SERVER_NAME']."/?l="; // without URL rewrite
//$shortURL_Prefix = "https://"."linkio.it"."/?l="; // without URL rewrite
try{

    //ottengo il codice del link breve del URL originale
    $shortCode = $shortener->urlToShortCode($longURL);
    // Creo URL breve
    $shortURL = $shortURL_Prefix.$shortCode;
    //echo "<a href='".$shortURL."'>".$shortURL."</a>";
    $linkFatto=true;
    
}catch(Exception $e){
    // Display error
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>linkio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fabio Compagnoni">
        <!--css-->
        <link rel="stylesheet" href="src/css/ris.css">
    </head>
    <body>
    <!--TODO bottoni copia e condivisore->api smanettone condivisore-->
    <!--TODO sistemare e abbellire tutte le pagine-->
        <?php
            if(isset($linkFatto)&&$linkFatto==true) 
            {
                echo "
                    <main>
                        <h1>Il tuo risultato</h1>
                    ";
                echo "
                        <div id='risultato'><a href='$shortURL'>$shortURL</a></div>
                    </main>
                    ";
            }
        ?>
    </body>
</html>