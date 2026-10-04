<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>The ArtBox</title>
</head>
<body>
    <?php require_once(__DIR__ .'/header.php'); ?>
    <main>
        <div id="liste-oeuvres">
        <?php require_once(__DIR__ . '/bdd.php');
        $mysqlClient = connexion (); //création/recup de la connexion PDO à la bdd sql
        $sqlQuery = 'SELECT * FROM oeuvres'; //création requête sql
        $oeuvresStatement = $mysqlClient->query($sqlQuery); //envoi requête (PDOstatement = requête préparée, puis le jeu de résultats associés)
        $oeuvres = $oeuvresStatement->fetchAll(); //récupération données requête sous forme de tableau php
        foreach ($oeuvres as $oeuvre) { ?>    
            <article class="oeuvre">
                <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                    <img src="<?= $oeuvre['oeuvreImage'] ?>" alt="<?= $oeuvre['oeuvreTitre'] ?>">
                    <h2><?= $oeuvre['oeuvreTitre'] ?></h2>
                    <p class="description"><?= $oeuvre['oeuvreArtiste'] ?></p>
                </a>
            </article>
            
        <?php  } ?>

        </div>
    </main>
    
<?php require_once(__DIR__ .'/footer.php'); ?>

</body>
</html>
