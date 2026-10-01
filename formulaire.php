<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajout d'oeuvres - The ArtBox</title>
</head>

<body>
    <?php require_once(__DIR__ .'/header.php'); ?>
    <main>
        <p><h1 class="titreFormulaire">Formulaire d'ajout d'oeuvres</h1></p><br>
        <form action="" method="post">
            <label for="id">Numéro d'oeuvre</label>
            <input type="text" name="numeroOeuvre" id="id" placeholder="(champ temporaire)" required>
            <label for="oeuvreImage">URL de l'image</label>
            <input type="url" name="oeuvreImage" id="oeuvreImage" required>
            <label for="oeuvreTitre">Titre de l'oeuvre</label>
            <input type="text" name="oeuvreTitre" id="oeuvreTitre" required>
            <label for="oeuvreArtiste">Nom de l'artiste</label>
            <input type="text" name="oeuvreArtiste" id="oeuvreArtiste" required>
            <label for="oeuvreDescription">Description de l'oeuvre</label>
            <textarea name="oeuvreDescription" id="oeuvreDescription"></textarea>
            <p><button type="submit">Ajouter l'oeuvre</button></p>
        </form>




    </main>
    
<?php require_once(__DIR__ .'/footer.php'); ?>

</body>
</html>