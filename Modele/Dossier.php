<?php

require_once 'Framework/Modele.php';

class Dossier extends Modele {

    // Retourne le dossier de santé du chien
    public function getDossier($chienId) {
        $sql = 'SELECT * FROM dossiers_de_sante WHERE chien_id = ?';
        $dossier = $this->executerRequete($sql, [$chienId]);

        if ($dossier->rowCount() == 1) {
            return $dossier->fetch(); // un seul dossier
        }
    }

    public function createDossier($chienId, $vetId = null, $sommaire = '') {
        $sql = 'INSERT INTO dossiers_de_sante (chien_id, vet_id, sommaire) VALUES (?, ?, ?)';
        $this->executerRequete($sql, [$chienId, $vetId, $sommaire]);
    }

    // Met a jour le dossier 
    public function updateDossier($chienId, $sommaire) {
        $sql = 'UPDATE dossiers_de_sante SET sommaire = ? WHERE chien_id = ?';
        $this->executerRequete($sql, [$sommaire, $chienId]);
    }
    
}
