<?php
    use model\dao\FilmDAO;
    use model\dao\Bdd;
    require_once __DIR__.'/../../includes/autoload.php';
    Bdd::connecter();

    include ("includes/_debut.inc.php");
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <div class="c-content-box c-size-md">
	<div class="container">
            <div class="cbp-panel">
	        <div id="filters-container" class="cbp-l-filters-dropdown">
	            <div class="cbp-l-filters-dropdownWrap">
	                <div class="cbp-l-filters-dropdownHeader">Sort Gallery</div>
	                <div class="cbp-l-filters-dropdownList">
	                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
	                        All (<div class="cbp-filter-counter"></div> items)
	                    </div>
	                    <div data-filter=".print" class="cbp-filter-item">
	                        Print (<div class="cbp-filter-counter"></div> items)
	                    </div>
	                    <div data-filter=".web-design" class="cbp-filter-item">
	                        Web Design (<div class="cbp-filter-counter"></div> items)
	                    </div>
	                    <div data-filter=".motion" class="cbp-filter-item">
	                        Motion (<div class="cbp-filter-counter"></div> items)
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div id="grid-container" class="cbp">
                    <?php
                        $lesFilms = FilmDAO::getAll();
                        // BOUCLE SUR LES GROUPES
                        foreach ($lesFilms as $unFilm) {
                            $idFilm = $unFilm->getIdFilm();
                            $titre = $unFilm->getTitre();
                            $affiche = $unFilm->getAffiche();
                            $bandeAnnonce = $unFilm->getBandeAnnonce();
                            $_SESSION['idFilm'] = $idFilm;
                    ?>
                        <div class="cbp-item print motion">
                            <a href="theme/demos/default/ajax/lightbox-gallery/project1.html" class="cbp-caption cbp-singlePageInline"
                               data-title="World Clock Widget<br>by Paul Flavius Nechita">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="<?php echo $affiche ?>" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title"><?php echo $titre ?></div>
                                            <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>    
        </div>
    </div>
</div>



<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <div class="c-content-box c-size-md">
	<div class="container">
            <div id="filters-container" class="cbp-l-filters-button">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                    All <div class="cbp-filter-counter"></div>
                </div>
                <div data-filter=".identity" class="cbp-filter-item">
                    Identity <div class="cbp-filter-counter"></div>
                </div>
                <div data-filter=".web-design" class="cbp-filter-item">
                    Web Design <div class="cbp-filter-counter"></div>
                </div>
                <div data-filter=".graphic" class="cbp-filter-item">
                    Graphic <div class="cbp-filter-counter"></div>
                </div> 
                <div data-filter=".logos" class="cbp-filter-item">
                    Logo <div class="cbp-filter-counter"></div>
                </div>
            </div>

            <div id="grid-container" class="cbp">
                <?php
                    $lesFilms = FilmDAO::getAll();
                    // BOUCLE SUR LES GROUPES
                    foreach ($lesFilms as $unFilm) {
                        $idFilm = $unFilm->getIdFilm();
                        $titre = $unFilm->getTitre();
                        $affiche = $unFilm->getAffiche();
                        $bandeAnnonce = $unFilm->getBandeAnnonce();
                        $_SESSION['idFilm'] = $idFilm;
                ?>
                    <div class="cbp-item graphic">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <img src="<?php echo $affiche ?>" alt="">
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <a href="view/film/film.php?id=<?php echo $idFilm?>" class="cbp-singlePage cbp-l-caption-buttonLeft btn btn-sm c-btn-square c-btn-border-1x c-btn-white  c-btn-uppercase">Explore</a>
                                        <a href="<?php echo $bandeAnnonce ?>" class="cbp-lightbox cbp-l-caption-buttonRight btn btn-sm c-btn-square c-btn-border-1x c-btn-white  c-btn-uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">Zoom</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    include ("includes/_fin.inc.php");
?>

