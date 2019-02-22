<?php
namespace model\metier;

/**
 * Description of Groupe
 * un groupe musical se produisant au festival
 * @author prof
 */
class Film {
    /**
     * @var int
     */
    private $idFilm;
    /**
     * @var string
     */
    private $titre;
    /**
     * @var string (URL)
     */
    private $affiche;
    /**
     * @var string (URL)
     */
    private $bandeAnnonce;

    function __construct($idFilm, $titre, $affiche, $bandeAnnonce) {
        $this->idFilm = $idFilm;
        $this->titre = $titre;
        $this->affiche = $affiche;
        $this->bandeAnnonce = $bandeAnnonce;
    }
    
    
    
    function getIdFilm() {
        return $this->idFilm;
    }

    function getTitre() {
        return $this->titre;
    }

    function getAffiche() {
        return $this->affiche;
    }

    function getBandeAnnonce() {
        return $this->bandeAnnonce;
    }

    function setIdFilm($idFilm) {
        $this->idFilm = $idFilm;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setAffiche($affiche) {
        $this->affiche = $affiche;
    }

    function setBandeAnnonce($bandeAnnonce) {
        $this->bandeAnnonce = $bandeAnnonce;
    }

}
