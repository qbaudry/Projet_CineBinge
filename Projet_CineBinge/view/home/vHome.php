<?php
    use model\dao\FilmDAO;
    use model\dao\Bdd;
    require_once __DIR__.'/../../includes/autoload.php';
    Bdd::connecter();

    include ("includes/_debut.inc.php");
?>
<!-- Main -->
<div id="main">
<?php
    $lesFilms = FilmDAO::getAll();
    // BOUCLE SUR LES GROUPES
    foreach ($lesFilms as $unFilm) {
        $titre = $unFilm->getTitre();
        $affiche = $unFilm->getAffiche();
        $bandeAnnonce = $unFilm->getBandeAnnonce();
        echo '<article class="thumb">
                <a href="'.$bandeAnnonce.'" class="image"><img src="'.$affiche.'" alt="" /></a>
                <h2>'.$titre.'</h2>
              </article>';
    }
?>
</div>
<?php
    include ("includes/_fin.inc.php");
?>