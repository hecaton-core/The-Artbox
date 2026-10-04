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
    <?php require_once(__DIR__ . '/bdd.php');
        $mysqlClient = connexion (); 

        if (empty($_GET['id'])) {
            header('location: index.php');
            exit ;
        }

        $sqlQuery = 'SELECT * FROM oeuvres WHERE id=:id'; 
        $oeuvresStatement = $mysqlClient->prepare($sqlQuery);
        $oeuvresStatement->execute([
            'id' => $_GET['id']
        ]);
        $oeuvre = $oeuvresStatement->fetch();

        if ($oeuvre === false) {
            header('location: index.php');
            exit ;
        }
    ?>
        <article id="detail-oeuvre">
            <div id="img-oeuvre">
                <img src="<?= $oeuvre['oeuvreImage'] ?>" alt="<?= $oeuvre['oeuvreTitre'] ?>">
            </div>
            <div id="contenu-oeuvre">
                <h1><?= $oeuvre['oeuvreTitre'] ?></h1>
                <p class="description"><?= $oeuvre['oeuvreArtiste'] ?></p>
                <p class="description-complete">
                <?= $oeuvre['oeuvreDescription'] ?>
                </p>
            </div>
        </article>

</main>

<?php require_once(__DIR__ .'/footer.php'); ?>
</body>
</html>