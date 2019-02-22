<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Film Test</title>
    </head>
    <body>
        <?php
            use model\metier\Film;
            require_once __DIR__ . '/../../includes\autoload.php';
            echo "<h2>Test unitaire de la classe métier Film</h2>";
            $objet = new Film(1,"Titre du film","URL Affiche","URL Bande_Annonce");
            var_dump($objet);
        ?>
    </body>
</html>
