<?php

require_once 'Modele/Modele.php';

/**
 * Fournit les services d'accès aux articles 
 * 
 * @author André Pilon
 */
class Veterinaire extends Modele {

// Renvoie la liste de tous les articles, triés par identifiant décroissant
    public function getVeterinaires() {
        $sql = 'select * from Veterinaires'
                . ' order by ID desc';
        $veterinaires = $this->executerRequete($sql);
        return $veterinaires;
    }

// Renvoie les informations sur un article
    function getVeterinaire($vet_id) {
        $sql = 'select * from Veterinaires'
                . ' where ID=?';
        $veterinaire = $this->executerRequete($sql, [$vet_id]);
        if ($veterinaire->rowCount() == 1) {
            return $veterinaire->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun article ne correspond à l'identifiant '$vet_id'");
        }
    }

 // Ajout d'un nouvel article
    public function setVeterinaire($veterinaire) {
        $sql = 'INSERT INTO veterinaires (nom, details, numero_de_telephone) VALUES(?, ?, ?)';
        $result = $this->executerRequete($sql, [$veterinaire['nom'], $veterinaire['details'], $veterinaire['numero_telephone']]);
        return $result;
    }

// Met à jour un article
    public function updateVeterinaire($article) {
        $sql = 'UPDATE veterinaires'
                . ' SET nom = ?, details = ?, numero_de_telephone = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$veterinaire['nom'], $veterinaire['details'], $veterinaire['numero_telephone']]);
        return $result;
    }
    
}