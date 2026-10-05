<?php

$postData = $_POST; 

if (
    empty($postData['oeuvreTitre'])
    || empty($postData['oeuvreArtiste'])
    || empty($postData['oeuvreImage'])
    || empty($postData['oeuvreDescription'])
    || strlen($postData['oeuvreDescription']) < 3
    || !filter_var($postData['oeuvreImage'], FILTER_VALIDATE_URL)

) { 
?>
    <link rel="stylesheet" href="css/style.css">
    <div class="erreurForm">Formulaire incorrect - veuillez vérifier :
        <br>-que les champs sont remplis
        <br>-que l'url est valide
        <br>-que la description contient au minimum 3 caractères
    </div>

<?php return; 
}

require_once(__DIR__ . '/bdd.php');
$mysqlClient = connexion();

$sqlQuery = 'INSERT INTO oeuvres(oeuvreImage, oeuvreTitre, oeuvreArtiste, oeuvreDescription) 
VALUES (:oeuvreImage, :oeuvreTitre, :oeuvreArtiste, :oeuvreDescription)';

$oeuvreAjout = $mysqlClient->prepare($sqlQuery);

$oeuvreAjout->execute([
    'oeuvreImage' => $postData['oeuvreImage'],
    'oeuvreTitre' => $postData['oeuvreTitre'],
    'oeuvreArtiste' => $postData['oeuvreArtiste'],
    'oeuvreDescription' => $postData['oeuvreDescription']
]);

header('location: index.php');
            exit ;

?>