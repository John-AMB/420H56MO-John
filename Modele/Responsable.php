<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Responsable extends Modele {

    // Renvoie la liste des commentaires associés à un article
    public function getResponsables() {
        $sql = 'select * from responsables'
                . ' order by ID desc';

        $responsables = $this->executerRequete($sql);
        return $responsables;
    }

// Renvoie un commentaire spécifique
    public function getResponsable($res_id) {
        $sql = 'select * from responsables'
                . ' where id = ?';
        $responsable = $this->executerRequete($sql, [$res_id]);
        if ($responsable->rowCount() == 1) {
            return $responsable->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$res_id'");
        }
    }

// Supprime un commentaire
    public function deleteResponsable($res_id) {
        $sql = 'DELETE FROM responsables'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$res_id]);
        return $result;
    }

// Ajoute un commentaire associés à un article
    public function setResponsable($responsable) {
        $sql = 'INSERT INTO responsables (nom, numero_de_telephone) VALUES(?, ?)';
        $result = $this->executerRequete($sql, [$responsable['nom'], $responsable['numero_de_telephone']]);
        return $result;
    }

}
