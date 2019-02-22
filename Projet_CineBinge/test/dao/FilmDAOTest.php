<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FilmDAO : test</title>
    </head>

    <body>

        <?php
        use model\metier\Film;
        use model\dao\FilmDAO;
        use model\dao\Bdd;

        require_once __DIR__ . '/../../includes/autoload.php';

        $idFilm = 1;
        Bdd::connecter();

        echo "<h2>Test FilmDAO</h2>";

        // Test n°1
        echo "<h3>Test getOneById</h3>";
        try {
            $objet = FilmDAO::getOneById($idFilm);
            var_dump($objet);
            echo "<h4>ooo réussite de la requête ooo</h4>";
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }

        // Test n°2
        echo "<h3>Test getAll</h3>";
        try {
            $lesObjets = FilmDAO::getAll();
            var_dump($lesObjets);
            echo "<h4>ooo réussite de la requête ooo</h4>";
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }
        
        // Test n°3
        echo "<h3>3- insert</h3>";
        try {
            $idFilm = 1;
            $objet = new Film($idFilm,"Titre du film","URL Affiche","URL Bande_Annonce");
            $ok = FilmDAO::insert($objet);
            if ($ok) {
                echo "<h4>ooo réussite de l'insertion ooo</h4>";
                $objetLu = FilmDAO::getOneById($idFilm);
                var_dump($objetLu);
            } else {
                echo "<h4>*** échec de l'insertion ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }
        
        // Test n°3-bis
        echo "<h3>3- insert déjà présent</h3>";
        try {
            $idFilm = 1;
            $objet = new Film($idFilm,"Titre du film","URL Affiche","URL Bande_Annonce");
            $ok = FilmDAO::insert($objet);
            if ($ok) {
                echo "<h4>*** échec du test : l'insertion ne devrait pas réussir  ***</h4>";
                $objetLu = Bdd::getOneById($idFilm);
                var_dump($objetLu);
            } else {
                echo "<h4>ooo réussite du test : l'insertion a logiquement échoué ooo</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>ooo réussite du test : la requête d'insertion a logiquement échoué ooo</h4>" . $e->getMessage();
        }
        
        // Test n°4
        echo "<h3>4- update</h3>";
        $idFilm = 1;
        $objet = new Film($idFilm,"Titre du film","URL Affiche","URL Bande_Annonce");
            
        try {
            $objet->setTitre('Titre du film 2');
            $ok = FilmDAO::update($idFilm, $objet);
            if ($ok) {
                echo "<h4>ooo réussite de la mise à jour ooo</h4>";
                $objetLu = FilmDAO::getOneById($idFilm);
                var_dump($objetLu);
            } else {
                echo "<h4>*** échec de la mise à jour ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }
        
        // Test n°5
        echo "<h3>5- delete</h3>";
        try {
            $ok = FilmDAO::delete($idFilm);
            if ($ok) {
                echo "<h4>ooo réussite de la suppression ooo</h4>";
            } else {
                echo "<h4>*** échec de la suppression ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }
        
        /*
        // Test n°7
        echo "<h3>6-1- isAnExistingIdInAttribution - id existant</h3>";
        $id = "g001"; // id existant
        try {
            $ok = GroupeDAO::isAnExistingIdInAttribution($id);
            if ($ok == 1) {
                echo "<h4>ooo réussite du test, l'id existe ooo</h4>";
            } else {
                echo "<h4>*** échec du test ***</h4>";
            }
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }
        echo "<h3>6-2- isAnExistingIdInAttribution - id inexistant</h3>";
        $id = "g101"; // id absent
        try {
            $ok = GroupeDAO::isAnExistingIdInAttribution($id);
            if ($ok == 1) {
                echo "<h4>*** échec du test, l'id ne devrait pas exister ***</h4>";
                echo "$ok";
            } else {
                echo "<h4>ooo réussite du test, l'id n'existe pas ooo</h4>";
            }
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }
        */
        Bdd::deconnecter();
        ?>
        
    </body>
</html>
