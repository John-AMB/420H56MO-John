<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Responsable extends Modele {


    public function connecter($login, $mdp)
    {
        $sql = "select id from responsables where nom = ? and mot_de_passe = ?";
        $responsable = $this->executerRequete($sql, array($login, $mdp));
        return ($responsable->rowCount() == 1);
    }
    
    // Renvoie la liste des commentaires associés à un article
    public function getResponsables() {
        $sql = 'select * from responsables'
                . ' order by ID desc';

        $responsables = $this->executerRequete($sql);
        return $responsables;
    }

    public function getUtilisateur($login, $mdp)
    {
        $sql = "select id, nom, mot_de_passe, numero_de_telephone 
            from responsables where nom = ? and mot_de_passe = ?";
        $responsable = $this->executerRequete($sql, array($login, $mdp));
        if ($responsable->rowCount() == 1)
            return $responsable->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun responsable ne correspond aux identifiants fournis");
    }
// Renvoie un commentaire spécifique
    public function getResponsable($id) {
        $sql = 'select * from responsables'
                . ' where id = ?';
        $responsable = $this->executerRequete($sql, [$id]);
        if ($responsable->rowCount() == 1) {
            return $responsable->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun responsable ne correspond à l'identifiant '$res_id'");
        }
    }

// // Supprime un commentaire
//     public function deleteResponsable($res_id) {
//         $sql = 'DELETE FROM responsables'
//                 . ' WHERE id = ?';
//         $result = $this->executerRequete($sql, [$res_id]);
//         return $result;
//     }

// Ajoute un commentaire associés à un article
    public function setResponsable($responsable) {
        $sql = 'INSERT INTO responsables (nom, mot_de_passe, numero_de_telephone, efface) VALUES(?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$responsable['nom'], $responsable['mot_de_passe'], $responsable['numero_de_telephone'], 0]);
        return $result;
    }


    // Efface un responsable
    public function deleteResponsable($res_id) {
        $sql = 'UPDATE responsables'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$res_id]);
        return $result;
    }

    // Réactive un responsable
    public function restoreResponsable($res_id) {
        $sql = 'UPDATE responsables'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$res_id]);
        return $result;
    }

}
