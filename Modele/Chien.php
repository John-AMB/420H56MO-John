<?php

require_once 'Modele/Modele.php';

/**
 * Fournit les services d'accès aux articles 
 * 
 * @author André Pilon
 */
class Chien extends Modele {

// Renvoie la liste de tous les articles, triés par identifiant décroissant
    public function getChiens() {
        //on ajoute le nom de responsable dans le table chien a la condition que responsable.id = chien.responsable_id
        //pour qu'on puisse montre le responsable dans le vueChiens
        $sql = 'SELECT c.*, r.nom AS responsable_nom
            FROM chiens c
            JOIN responsables r ON c.responsable_id = r.id
            ORDER BY c.id DESC';
        $chiens = $this->executerRequete($sql);
        return $chiens;
    }


// Renvoie les informations sur un article
    function getChien($idChien) {
        $sql = 'select * from Chiens'
                . ' where ID=?';
        $chien = $this->executerRequete($sql, [$idChien]);
        if ($chien->rowCount() == 1) {
            return $chien->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun article ne correspond à l'identifiant '$idChien'");
        }
    }

 // Ajout d'un nouvel article
    public function setReqChien($chien) {
        $sql = 'INSERT INTO chiens (nom_chien, sexe, date_de_naissance, vet_id, responsable_id) VALUES(?, ?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$chien['nom_chien'], $chien['sexe'], $chien['date_de_naissance'], $chien['vet_id'], $chien['responsable_id']]);
        return $result;
    }
    
    // Met à jour un article
    public function updateChien($chien) {
        $sql = 'UPDATE chiens'
                . ' SET nom_chien = ?, sexe = ?, date_de_naissance = ?, vet_id = ?, responsable_id = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$chien['nom_chien'], $chien['sexe'], $chien['date_de_naissance'], $chien['vet_id'], $chien['responsable_id'], $chien['id']]);
        return $result;
    }

    public function setDossierDeSante($chienId, $vetId) {
    $sql = 'INSERT INTO dossiers_de_sante (chien_id, vet_id, sommaire) VALUES (?, ?, ?)';
    $sommaire = ''; 
    $result = $this->executerRequete($sql, [$chienId, $vetId, $sommaire]);
    return $result;
    }

    //on retrouve le id de dernier chien cree
    public function getLastInsertId() {
    $sql = "SELECT LAST_INSERT_ID()";
    return $this->executerRequete($sql)->fetchColumn();
}
    
}