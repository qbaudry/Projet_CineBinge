<?php
namespace model\dao;

use model\metier\Film;
use PDOStatement;
use PDO;

class FilmDAO {

    /**
     * Instancier un objet de la classe Film à partir d'un enregistrement de la table FILM
     * @param array $enreg
     * @return Film
     */
    protected static function enregVersMetier(array $enreg) {
        $idFilm = $enreg['IDFILM'];
        $titre = $enreg['TITRE'];
        $affiche = $enreg['AFFICHE'];
        $bandeAnnonce = $enreg['BANDEANNONCE'];
        
        $unFilm = new Film($idFilm, $titre, $affiche, $bandeAnnonce);

        return $unFilm;
    }
    
    /**
     * Complète une requête préparée
     * les paramètres de la requête associés aux valeurs des attributs d'un objet métier
     * @param Film $objetMetier
     * @param PDOStatement $stmt
     */
    protected static function metierVersEnreg(Film $objetMetier, PDOStatement $stmt) {
        $stmt->bindValue(':idFilm', $objetMetier->getIdFilm());
        $stmt->bindValue(':titre', $objetMetier->getTitre());
        $stmt->bindValue(':affiche', $objetMetier->getAffiche());
        $stmt->bindValue(':bandeAnnonce', $objetMetier->getBandeAnnonce());
    }

    /**
     * Retourne la liste de tous les films
     * @return array tableau d'objets de type Film
     */
    public static function getAll() {
        $lesObjets = array();
        $requete = "SELECT * FROM Film";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            // Tant qu'il y a des enregistrements dans la table
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //ajoute un nouveau groupe au tableau
                $lesObjets[] = self::enregVersMetier($enreg);
            }
        }
        return $lesObjets;
    }

    /**
     * Recherche un film selon la valeur de son identifiant
     * @param string $idFilm
     * @return Film le film trouvé; null sinon
     */
    public static function getOneById($idFilm) {
        $objetConstruit = null;
        $requete = "SELECT * FROM Film WHERE IDFILM = :idFilm";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':idFilm', $idFilm);
        $ok = $stmt->execute();
        // attention, $ok = true pour un select ne retournant aucune ligne
        if ($ok && $stmt->rowCount() > 0) {
            $objetConstruit = self::enregVersMetier($stmt->fetch(PDO::FETCH_ASSOC));
        }
        return $objetConstruit;
    }
    
    /**
     * Insérer un nouvel enregistrement dans la table à partir de l'état d'un objet métier
     * @param Film $objet objet métier à insérer
     * @return boolean = FALSE si l'opération échoue
     */
    public static function insert(Film $objet) {
        $requete = "INSERT INTO Film VALUES (:idFilm, :titre, :affiche, :bandeAnnonce)";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $ok = $stmt->execute();
        return ($ok && $stmt->rowCount() > 0);
    }
    
    /**
     * Mettre à jour enregistrement dans la table à partir de l'état d'un objet métier
     * @param string identifiant de l'enregistrement à mettre à jour
     * @param Film $objet objet métier à mettre à jour
     * @return boolean = FALSE si l'opérationn échoue
     */
    public static function update($idFilm, Film $objet) {
        $requete = "UPDATE Film SET TITRE =:titre, AFFICHE =:affiche, 
            BANDEANNONCE =:bandeAnnonce WHERE IDFILM = :idFilm";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $stmt->bindParam(':idFilm', $idFilm);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }
    
    /**
     * Détruire un enregistrement de la table FILM d'après son identifiant
     * @param string identifiant de l'enregistrement à détruire
     * @return boolean = TRUE si l'enregistrement est détruit, = FALSE si l'opération échoue
     */
    public static function delete($idFilm) {
        $ok = false;
        $requete = "DELETE FROM Film WHERE IDFILM = :idFilm";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':idFilm', $idFilm);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }

    /**
     * Recherche si le titre proposé existe déjà dans la base de données
     * @param boolean $estModeCreation = TRUE si mode création, =false si modification
     * @param string $id id du groupe à vérifier
     * @param string $nom
     * @return int le nombre de libellés de groupe déjà existant dans la BD (0 ou 1) ; c'est donc aussi un booléen
     
    public static function isAnExistingTitre($estModeCreation, $id, $nom) {
        $nom = str_replace("'", "''", $nom);
        // S'il s'agit d'une création, on vérifie juste la non existence du libellé
        // sinon on vérifie la non existence d'un autre type chambre (id!='$id') 
        // ayant le même libelle
        if ($estModeCreation) {
            $requete = "SELECT COUNT(*) FROM Groupe WHERE NOM=:nom";
            $stmt = Bdd::getPdo()->prepare($requete);
            $stmt->bindParam(':nom', $nom);
        } else {
            $requete = "SELECT COUNT(*) FROM Groupe WHERE NOM=:nom and ID <> :id";
            $stmt = Bdd::getPdo()->prepare($requete);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':id', $id);
        }
        $stmt->execute();
        return $stmt->fetchColumn(0);
    }*/


    /**
     * Recherche un identifiant de type de chambre existant
     * @param string $id du type de chambre recherché
     * @return int le nombre de types de chambres correspondant à cet id (0 ou 1)
     
    public static function isAnExistingId($id) {
        $requete = "SELECT COUNT(*) FROM Groupe WHERE ID=:id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchColumn(0);
    }*/
    
}
